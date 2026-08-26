$ErrorActionPreference = "Stop"

$workspace = [System.IO.Path]::GetFullPath((Join-Path $PSScriptRoot ".."))
$backupRoot = [System.IO.Path]::GetFullPath((Join-Path $workspace "backups"))
$supabase = [System.IO.Path]::GetFullPath((Join-Path $workspace "node_modules\.bin\supabase.CMD"))

if (-not (Test-Path -LiteralPath $supabase -PathType Leaf)) {
  throw "The local Supabase CLI is missing. Run pnpm install first."
}

New-Item -ItemType Directory -Path $backupRoot -Force | Out-Null
$stamp = Get-Date -Format "yyyyMMdd-HHmmss"
$target = [System.IO.Path]::GetFullPath((Join-Path $backupRoot "supabase-$stamp"))

if (-not $target.StartsWith($backupRoot, [System.StringComparison]::OrdinalIgnoreCase)) {
  throw "Unexpected backup target."
}

New-Item -ItemType Directory -Path $target | Out-Null
$schemaFile = Join-Path $target "schema.sql"
$dataFile = Join-Path $target "data.sql"
$publicDataFile = Join-Path $target "public-data.sql"
$rolesFile = Join-Path $target "roles.sql"

try {
  & $supabase db dump --local --file $schemaFile --log-level error
  if ($LASTEXITCODE -ne 0) { throw "Schema backup failed." }

  & $supabase db dump --local --data-only --use-copy --file $dataFile --log-level error
  if ($LASTEXITCODE -ne 0) { throw "Data backup failed." }

  & $supabase db dump --local --data-only --use-copy --schema public --file $publicDataFile --log-level error
  if ($LASTEXITCODE -ne 0) { throw "Public data backup failed." }

  & $supabase db dump --local --role-only --file $rolesFile --log-level error
  if ($LASTEXITCODE -ne 0) { throw "Role backup failed." }

  $files = @($schemaFile, $dataFile, $publicDataFile, $rolesFile) | ForEach-Object {
    $file = Get-Item -LiteralPath $_
    [ordered]@{
      name = $file.Name
      bytes = $file.Length
      sha256 = (Get-FileHash -LiteralPath $file.FullName -Algorithm SHA256).Hash.ToLowerInvariant()
    }
  }

  $manifest = [ordered]@{
    formatVersion = 1
    createdAtUtc = (Get-Date).ToUniversalTime().ToString("o")
    source = "Supabase local"
    containsPrivateData = $true
    files = $files
  }
  $manifest | ConvertTo-Json -Depth 5 | Set-Content -LiteralPath (Join-Path $target "manifest.json") -Encoding utf8

  Write-Output "Private local backup created: $target"
  Write-Output "Run pnpm backup:verify to verify its integrity."
} catch {
  if (Test-Path -LiteralPath $target) {
    Remove-Item -LiteralPath $target -Recurse -Force
  }
  throw
}
