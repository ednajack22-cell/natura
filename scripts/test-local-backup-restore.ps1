param(
  [string]$BackupPath
)

$ErrorActionPreference = "Stop"
$workspace = [System.IO.Path]::GetFullPath((Join-Path $PSScriptRoot ".."))
$backupRoot = [System.IO.Path]::GetFullPath((Join-Path $workspace "backups"))
$docker = "C:\Program Files\Docker\Docker\resources\bin\docker.exe"
$postgresImage = "public.ecr.aws/supabase/postgres:17.6.1.156"
$containerName = "natura-restore-test-$([DateTime]::UtcNow.ToString('yyyyMMddHHmmss'))-$([Guid]::NewGuid().ToString('N').Substring(0, 6))"
$containerStarted = $false

function Wait-IsolatedPostgres {
  $consecutiveReadyChecks = 0
  for ($attempt = 0; $attempt -lt 120; $attempt++) {
    & $docker exec $containerName pg_isready -U postgres -d postgres *> $null
    if ($LASTEXITCODE -eq 0) {
      $consecutiveReadyChecks++
      if ($consecutiveReadyChecks -ge 5) { return }
    } else {
      $consecutiveReadyChecks = 0
    }
    Start-Sleep -Seconds 1
  }
  throw "The isolated PostgreSQL container did not become stably ready."
}

if (-not (Test-Path -LiteralPath $docker -PathType Leaf)) {
  throw "Docker Desktop is required for the isolated restoration rehearsal."
}

if (-not $BackupPath) {
  $latest = Get-ChildItem -LiteralPath $backupRoot -Directory -Filter "supabase-*" -ErrorAction SilentlyContinue |
    Sort-Object Name -Descending |
    Select-Object -First 1
  if (-not $latest) { throw "No local Supabase backup was found." }
  $BackupPath = $latest.FullName
}

$target = [System.IO.Path]::GetFullPath($BackupPath)
if (-not $target.StartsWith($backupRoot, [System.StringComparison]::OrdinalIgnoreCase)) {
  throw "Only backups inside the Natura private backup directory can be restored."
}

& (Join-Path $PSScriptRoot "verify-local-backup.ps1") -BackupPath $target

$schemaFile = Join-Path $target "schema.sql"
$dataFile = Join-Path $target "public-data.sql"
$rolesFile = Join-Path $target "roles.sql"

if (-not (Test-Path -LiteralPath $dataFile -PathType Leaf)) {
  throw "This backup predates isolated public-data restore support. Create a new backup first."
}
$disposablePassword = [Guid]::NewGuid().ToString("N")

try {
  & $docker run --detach --name $containerName --network none --tmpfs "/var/lib/postgresql/data:rw,size=1g" -e "POSTGRES_PASSWORD=$disposablePassword" -e "POSTGRES_DB=postgres" $postgresImage | Out-Null
  if ($LASTEXITCODE -ne 0) { throw "The isolated PostgreSQL container could not start." }
  $containerStarted = $true

  Wait-IsolatedPostgres

  & $docker cp $rolesFile "${containerName}:/tmp/roles.sql" | Out-Null
  & $docker cp $schemaFile "${containerName}:/tmp/schema.sql" | Out-Null
  & $docker cp $dataFile "${containerName}:/tmp/public-data.sql" | Out-Null
  if ($LASTEXITCODE -ne 0) { throw "Backup files could not be copied into the isolated container." }

  & $docker exec $containerName psql -v ON_ERROR_STOP=1 -U supabase_admin -d postgres -c "do `$`$ begin if not exists (select 1 from pg_roles where rolname = 'supabase_realtime_admin') then create role supabase_realtime_admin nologin; end if; end `$`$;" *> $null
  if ($LASTEXITCODE -ne 0) { throw "The isolated Supabase compatibility role could not be prepared." }

  foreach ($sqlFile in @("roles.sql", "schema.sql", "public-data.sql")) {
    & $docker exec $containerName psql -v ON_ERROR_STOP=1 -U supabase_admin -d postgres -f "/tmp/$sqlFile" *> $null
    if ($LASTEXITCODE -ne 0) { throw "Restore failed while applying $sqlFile." }
    Wait-IsolatedPostgres
  }

  $contentCount = (& $docker exec $containerName psql -At -v ON_ERROR_STOP=1 -U supabase_admin -d postgres -c "select count(*) from public.content_items;").Trim()
  $publishedCount = (& $docker exec $containerName psql -At -v ON_ERROR_STOP=1 -U supabase_admin -d postgres -c "select count(*) from public.content_items where status = 'published';").Trim()
  $rlsCount = (& $docker exec $containerName psql -At -v ON_ERROR_STOP=1 -U supabase_admin -d postgres -c "select count(*) from pg_class where relnamespace = 'public'::regnamespace and relkind = 'r' and relrowsecurity;").Trim()

  if ([int]$contentCount -lt 1 -or [int]$publishedCount -lt 1 -or [int]$rlsCount -lt 1) {
    throw "The restored database did not pass the content and RLS sanity checks."
  }

  Write-Output "Isolated restore rehearsal passed."
  Write-Output "Restored content items: $contentCount; published: $publishedCount; RLS-protected public tables: $rlsCount."
} finally {
  if ($containerStarted) {
    if (-not $containerName.StartsWith("natura-restore-test-", [System.StringComparison]::Ordinal)) {
      throw "Refusing to remove an unexpected container."
    }
    & $docker rm --force --volumes $containerName *> $null
  }
}
