#!/usr/bin/env bash
# Builds the two installable files:
#   dist/natura.zip       theme   (Appearance → Themes → Add → Upload)
#   dist/natura-core.zip  plugin  (Plugins → Add → Upload)
# Each zip holds a single top-level folder, which is what WordPress expects.
set -euo pipefail

cd "$(dirname "$0")"
rm -rf dist
mkdir -p dist

for folder in natura natura-core; do
  zip -rq "dist/${folder}.zip" "$folder" -x '*/.DS_Store' -x '*/node_modules/*'
  echo "dist/${folder}.zip ($(du -k "dist/${folder}.zip" | cut -f1) KB)"
done
