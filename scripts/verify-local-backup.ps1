param(
  [string]$BackupPath
)

$ErrorActionPreference = "Stop"
$workspace = [System.IO.Path]::GetFullPath((Join-Path $PSScriptRoot ".."))
$backupRoot = [System.IO.Path]::GetFullPath((Join-Path $workspace "backups"))

if (-not $BackupPath) {
  $latest = Get-ChildItem -LiteralPath $backupRoot -Directory -Filter "supabase-*" -ErrorAction SilentlyContinue |
    Sort-Object Name -Descending |
    Select-Object -First 1
  if (-not $latest) { throw "No local Supabase backup was found." }
  $BackupPath = $latest.FullName
}

$target = [System.IO.Path]::GetFullPath($BackupPath)
if (-not $target.StartsWith($backupRoot, [System.StringComparison]::OrdinalIgnoreCase)) {
  throw "Only backups inside the Natura private backup directory can be verified."
}

$manifestPath = Join-Path $target "manifest.json"
if (-not (Test-Path -LiteralPath $manifestPath -PathType Leaf)) {
  throw "The backup manifest is missing."
}

$manifest = Get-Content -LiteralPath $manifestPath -Raw | ConvertFrom-Json
if ($manifest.formatVersion -ne 1 -or -not $manifest.containsPrivateData) {
  throw "The backup manifest is invalid."
}

foreach ($entry in $manifest.files) {
  $filePath = [System.IO.Path]::GetFullPath((Join-Path $target $entry.name))
  if (-not $filePath.StartsWith($target, [System.StringComparison]::OrdinalIgnoreCase)) {
    throw "The manifest contains an invalid path."
  }
  if (-not (Test-Path -LiteralPath $filePath -PathType Leaf)) {
    throw "Backup file missing: $($entry.name)"
  }

  $file = Get-Item -LiteralPath $filePath
  $hash = (Get-FileHash -LiteralPath $filePath -Algorithm SHA256).Hash.ToLowerInvariant()
  if ($file.Length -ne [long]$entry.bytes -or $hash -ne $entry.sha256) {
    throw "Backup integrity check failed: $($entry.name)"
  }
}

Write-Output "Backup integrity verified: $target"
Write-Output "All declared files match their recorded size and SHA-256 digest."
