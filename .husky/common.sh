#!/usr/bin/env sh
command_exists () {
  command -v "$1" >/dev/null 2>&1
}

if ! command_exists node; then
  echo "node is required to run hooks. Please install node and try again." >&2
  exit 1
fi
