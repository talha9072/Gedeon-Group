Write-Host "WHG WordPress MCP setup for Windows" -ForegroundColor Cyan
Write-Host "-----------------------------------"

try {
    $nodeVersion = node -p "process.versions.node"
} catch {
    Write-Host "Node.js is not installed. Install Node 22 LTS first, then re-run this script." -ForegroundColor Red
    exit 1
}

try {
  $wpVersion = wp --version
} catch {
  Write-Host "WP-CLI is not installed or is not available as 'wp' in this terminal." -ForegroundColor Red
  Write-Host "Install WP-CLI, then re-run this script." -ForegroundColor Red
  exit 1
}

$nodeMajor = [int](node -p "process.versions.node.split('.')[0]")
if ($nodeMajor -lt 20) {
    Write-Host "Node.js 20+ is required. Node 22 LTS is recommended." -ForegroundColor Red
    Write-Host "Current version: $(node -v)"
    exit 1
}

Write-Host "Using Node: $(node -v)"
Write-Host "Using npm: $(npm -v)"
Write-Host "Using WP-CLI: $wpVersion"

Write-Host ""
Write-Host "Installing WordPress MCP packages globally..." -ForegroundColor Cyan
npm install -g wp-devdocs-mcp wp-blockmarkup-mcp

Write-Host ""
Write-Host "Indexing WordPress developer docs..." -ForegroundColor Cyan
wp-hooks quick-add wp-core
wp-hooks quick-add woocommerce
wp-hooks quick-add gutenberg-source
wp-hooks quick-add plugin-handbook
wp-hooks quick-add theme-json

Write-Host ""
Write-Host "Indexing Gutenberg block markup sources..." -ForegroundColor Cyan
wp-blocks source:add `
  --name gutenberg `
  --type github-public `
  --repo https://github.com/WordPress/gutenberg `
  --branch trunk

Write-Host ""
Write-Host "Indexing WooCommerce block markup sources..." -ForegroundColor Cyan
wp-blocks source:add `
  --name woocommerce-blocks `
  --type github-public `
  --repo https://github.com/woocommerce/woocommerce `
  --subfolder plugins/woocommerce-blocks `
  --branch trunk

Write-Host ""
Write-Host "Stats:" -ForegroundColor Cyan
wp-hooks stats
wp-blocks stats

Write-Host ""
Write-Host "Done. In VS Code run: Ctrl+Shift+P -> MCP: List Servers" -ForegroundColor Green
Write-Host "Start: wp-devdocs, wp-blockmarkup, core-context7, dev-playwright"
