$ErrorActionPreference = "Stop"

$workspace = [System.IO.Path]::GetFullPath((Join-Path $PSScriptRoot ".."))
$nextCli = [System.IO.Path]::GetFullPath((Join-Path $workspace "node_modules\next\dist\bin\next"))
$baseUrl = "http://localhost:3100"
$server = $null

function Test-NaturaPerformanceServer {
  try {
    $response = Invoke-WebRequest -Uri "$baseUrl/healthz" -UseBasicParsing -TimeoutSec 2
    return $response.StatusCode -eq 200
  } catch {
    return $false
  }
}

try {
  $server = Start-Process -FilePath "node" -ArgumentList @($nextCli, "start", "-p", "3100") -WorkingDirectory $workspace -WindowStyle Hidden -PassThru
  $ready = $false
  for ($attempt = 0; $attempt -lt 60; $attempt++) {
    if (Test-NaturaPerformanceServer) { $ready = $true; break }
    if ($server.HasExited) { throw "The production performance server stopped before becoming ready." }
    Start-Sleep -Milliseconds 500
  }
  if (-not $ready) { throw "The production performance server did not become ready within 30 seconds." }

  $env:NATURA_BASE_URL = $baseUrl
  & node (Join-Path $PSScriptRoot "check-performance.mjs")
  $checkExitCode = $LASTEXITCODE
} finally {
  Remove-Item Env:NATURA_BASE_URL -ErrorAction SilentlyContinue
  if ($server -and -not $server.HasExited) {
    Stop-Process -Id $server.Id -Force
    $null = $server.WaitForExit(5000)
  }
}

exit $checkExitCode
