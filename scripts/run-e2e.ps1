$ErrorActionPreference = "Stop"

$workspace = [System.IO.Path]::GetFullPath((Join-Path $PSScriptRoot ".."))
$nextCli = [System.IO.Path]::GetFullPath((Join-Path $workspace "node_modules\next\dist\bin\next"))
$playwright = [System.IO.Path]::GetFullPath((Join-Path $workspace "node_modules\.bin\playwright.CMD"))
$baseUrl = if ($env:PLAYWRIGHT_BASE_URL) { $env:PLAYWRIGHT_BASE_URL.TrimEnd("/") } else { "http://localhost:3000" }
$ownedServer = $null
$originalExternalFlag = $env:NATURA_E2E_EXTERNAL_SERVER
$originalTestAdminEmail = $env:NATURA_TEST_ADMIN_EMAIL
$originalTestAdminPassword = $env:NATURA_TEST_ADMIN_PASSWORD

$envPath = Join-Path $workspace ".env.local"
if (Test-Path -LiteralPath $envPath) {
  $localValues = @{}
  foreach ($line in Get-Content -LiteralPath $envPath) {
    if ($line -match "^([^#][^=]+)=(.*)$") { $localValues[$matches[1].Trim()] = $matches[2].Trim() }
  }
  $env:NATURA_TEST_ADMIN_EMAIL = $localValues["NATURA_LOCAL_ADMIN_EMAIL"]
  $env:NATURA_TEST_ADMIN_PASSWORD = $localValues["NATURA_LOCAL_ADMIN_PASSWORD"]
}

function Test-NaturaServer {
  try {
    $response = Invoke-WebRequest -Uri "$baseUrl/healthz" -UseBasicParsing -TimeoutSec 2
    return $response.StatusCode -eq 200
  } catch {
    return $false
  }
}

try {
  if (-not (Test-NaturaServer)) {
    $ownedServer = Start-Process -FilePath "node" -ArgumentList @($nextCli, "dev") -WorkingDirectory $workspace -WindowStyle Hidden -PassThru
    $ready = $false
    for ($attempt = 0; $attempt -lt 120; $attempt++) {
      if (Test-NaturaServer) {
        $ready = $true
        break
      }
      if ($ownedServer.HasExited) { throw "The Natura test server stopped before becoming ready." }
      Start-Sleep -Milliseconds 500
    }
    if (-not $ready) { throw "The Natura test server did not become ready within 60 seconds." }
  }

  $env:NATURA_E2E_EXTERNAL_SERVER = "1"
  & $playwright test --workers=1
  $testExitCode = $LASTEXITCODE
} finally {
  $env:NATURA_E2E_EXTERNAL_SERVER = $originalExternalFlag
  $env:NATURA_TEST_ADMIN_EMAIL = $originalTestAdminEmail
  $env:NATURA_TEST_ADMIN_PASSWORD = $originalTestAdminPassword
  if ($ownedServer -and -not $ownedServer.HasExited) {
    Stop-Process -Id $ownedServer.Id -Force
    $null = $ownedServer.WaitForExit(5000)
  }
}

exit $testExitCode
