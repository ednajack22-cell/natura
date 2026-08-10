$ErrorActionPreference = "Stop"

$projectRoot = [System.IO.Path]::GetFullPath((Join-Path $PSScriptRoot ".."))
$envPath = Join-Path $projectRoot ".env.local"
$supabaseCli = Join-Path $projectRoot "node_modules\.bin\supabase.CMD"

if (-not (Test-Path -LiteralPath $envPath)) { throw ".env.local is missing." }
if (-not (Test-Path -LiteralPath $supabaseCli)) { throw "Supabase CLI is not installed." }

$localValues = @{}
foreach ($line in Get-Content -LiteralPath $envPath) {
  if ($line -match "^([^#][^=]+)=(.*)$") { $localValues[$matches[1].Trim()] = $matches[2].Trim() }
}

$email = $localValues["NATURA_LOCAL_ADMIN_EMAIL"]
$password = $localValues["NATURA_LOCAL_ADMIN_PASSWORD"]
if (-not $email -or -not $password) { throw "Local administrator credentials are missing from .env.local." }

$statusValues = @{}
foreach ($line in & $supabaseCli status -o env) {
  if ($line -match "^([^=]+)=(.*)$") { $statusValues[$matches[1].Trim()] = $matches[2].Trim().Trim('"') }
}

$apiUrl = $statusValues["API_URL"]
$serviceRoleKey = $statusValues["SERVICE_ROLE_KEY"]
if (-not $apiUrl -or -not $serviceRoleKey) { throw "Supabase local is not running." }

$headers = @{ apikey = $serviceRoleKey; Authorization = "Bearer $serviceRoleKey" }
$usersResponse = Invoke-RestMethod -Uri "$apiUrl/auth/v1/admin/users?per_page=100" -Headers $headers -Method Get
$existing = $usersResponse.users | Where-Object { $_.email -eq $email }

if ($existing) {
  $updatePayload = @{
    app_metadata = @{ natura_admin = $true }
    user_metadata = @{ display_name = "Natura Administrator" }
  } | ConvertTo-Json -Depth 4
  Invoke-RestMethod -Uri "$apiUrl/auth/v1/admin/users/$($existing.id)" -Headers $headers -Method Put -ContentType "application/json" -Body $updatePayload | Out-Null
  Write-Output "Local Natura administrator synchronized."
  exit 0
}

$payload = @{
  email = $email
  password = $password
  email_confirm = $true
  app_metadata = @{ natura_admin = $true }
  user_metadata = @{ display_name = "Natura Administrator" }
} | ConvertTo-Json -Depth 4

Invoke-RestMethod -Uri "$apiUrl/auth/v1/admin/users" -Headers $headers -Method Post -ContentType "application/json" -Body $payload | Out-Null
Write-Output "Local Natura administrator created."
