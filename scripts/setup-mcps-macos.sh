#!/usr/bin/env bash
set -euo pipefail

echo "WHG WordPress MCP setup for macOS"
echo "---------------------------------"

if ! command -v node >/dev/null 2>&1; then
  echo "Node.js is not installed. Install Node 22 LTS first, then re-run this script."
  exit 1
fi

if ! command -v wp >/dev/null 2>&1; then
  echo "WP-CLI is not installed or is not available as 'wp' in this terminal."
  echo "Install WP-CLI, then re-run this script."
  exit 1
fi

NODE_MAJOR=$(node -p "process.versions.node.split('.')[0]")
if [ "$NODE_MAJOR" -lt 20 ]; then
  echo "Node.js 20+ is required. Node 22 LTS is recommended."
  echo "Current version: $(node -v)"
  exit 1
fi

echo "Using Node: $(node -v)"
echo "Using npm: $(npm -v)"
echo "Using WP-CLI: $(wp --version)"

echo ""
echo "Installing WordPress MCP packages globally..."
npm install -g wp-devdocs-mcp wp-blockmarkup-mcp

echo ""
echo "Indexing WordPress developer docs..."
wp-hooks quick-add wp-core || true
wp-hooks quick-add woocommerce || true
wp-hooks quick-add gutenberg-source || true
wp-hooks quick-add plugin-handbook || true
wp-hooks quick-add theme-json || true

echo ""
echo "Indexing Gutenberg block markup sources..."
wp-blocks source:add \
  --name gutenberg \
  --type github-public \
  --repo https://github.com/WordPress/gutenberg \
  --branch trunk || true

echo ""
echo "Indexing WooCommerce block markup sources..."
wp-blocks source:add \
  --name woocommerce-blocks \
  --type github-public \
  --repo https://github.com/woocommerce/woocommerce \
  --subfolder plugins/woocommerce-blocks \
  --branch trunk || true

echo ""
echo "Stats:"
wp-hooks stats || true
wp-blocks stats || true

echo ""
echo "Done. In VS Code run: Cmd+Shift+P -> MCP: List Servers"
echo "Start: wp-devdocs, wp-blockmarkup, core-context7, dev-playwright"
