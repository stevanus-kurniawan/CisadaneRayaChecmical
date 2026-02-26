# Single entrypoint to run Cisadane Raya Chemical locally
# Tries Docker first; use -NoDocker to run with PHP + SQLite only.

param([switch]$NoDocker)

$Frontend = Join-Path $PSScriptRoot "frontend"
if (-not (Test-Path $Frontend)) {
    Write-Host "frontend folder not found. Run from project root." -ForegroundColor Red
    exit 1
}

if ($NoDocker) {
    Write-Host "Running without Docker (PHP + SQLite)..." -ForegroundColor Cyan
    Set-Location $Frontend
    & (Join-Path $Frontend "run-local-no-docker.ps1")
    exit
}

# Prefer Docker
$dockerOk = $false
try {
    docker ps 2>$null | Out-Null
    $dockerOk = $true
} catch {}

if ($dockerOk) {
    Set-Location $Frontend
    & (Join-Path $Frontend "docker-start.ps1")
    exit
}

Write-Host "Docker not running or not installed." -ForegroundColor Yellow
Write-Host "Run without Docker (PHP + SQLite):" -ForegroundColor Cyan
Write-Host "  .\run-local.ps1 -NoDocker" -ForegroundColor White
Write-Host ""
Write-Host "Or start Docker Desktop and run again:" -ForegroundColor Cyan
Write-Host "  .\run-local.ps1" -ForegroundColor White
exit 1
