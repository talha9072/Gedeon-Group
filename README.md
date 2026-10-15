# WHG Client WordPress Starter

This repository is a starter template for Web Hosting Guru client WordPress sites.

It is designed for:

- native WordPress/Gutenberg builds
- block themes
- reusable block patterns
- VS Code + GitHub Copilot
- MCP-assisted WordPress development
- non-headless WordPress websites

## Included

```text
.github/copilot-instructions.md
.vscode/mcp.json
scripts/setup-mcps-macos.sh
scripts/setup-mcps-windows.ps1
.nvmrc
theme/
```

## Required local tools

Install these before running the setup:

- VS Code
- Git
- GitHub Copilot extension
- Node.js 22 LTS recommended
- npm
- WP-CLI available from your terminal as `wp`
- a local WordPress environment, such as Local by Flywheel, WordPress Studio, Docker, or another local server

Node 22 LTS is recommended because some MCP dependencies use native modules and can fail on very new Node versions.

Confirm WP-CLI works before starting a client build:

```bash
wp --info
```

When working inside a local WordPress install, also confirm WordPress can be reached:

```bash
wp core version --path=/path/to/wordpress
```

For Local by Flywheel, run WP-CLI from the site's `app/public` directory or pass that directory with `--path`.

## MCPs used by this starter

The workspace MCP config is in:

```text
.vscode/mcp.json
```

It configures:

- `wp-devdocs` – WordPress/WooCommerce code context
- `wp-blockmarkup` – valid Gutenberg block markup and pattern generation
- `core-context7` – current public package/framework docs
- `dev-playwright` – browser testing and UI checks
- `figma` – local Figma MCP endpoint for approved design context and assets

For projects with approved Figma designs, also enable the official Figma MCP in VS Code or Figma Dev Mode and use it as the source of truth for layouts, variables, colours, typography, spacing, assets, and responsive states.

## macOS setup

From the repo root:

```bash
chmod +x scripts/setup-mcps-macos.sh
./scripts/setup-mcps-macos.sh
```

Then open VS Code and run:

```text
Cmd + Shift + P -> MCP: List Servers
```

Start:

```text
wp-devdocs
wp-blockmarkup
core-context7
dev-playwright
figma
```

## Windows setup

Open PowerShell from the repo root and run:

```powershell
Set-ExecutionPolicy -Scope Process -ExecutionPolicy Bypass
.\scripts\setup-mcps-windows.ps1
```

Then open VS Code and run:

```text
Ctrl + Shift + P -> MCP: List Servers
```

Start:

```text
wp-devdocs
wp-blockmarkup
core-context7
dev-playwright
figma
```

## Confirm the MCP indexes work

Run:

```bash
wp-hooks stats
wp-blocks stats
```

You can also test:

```bash
wp-hooks search "enqueue scripts"
wp-hooks search-theme-json "color palette"
wp-blocks search "buttons"
wp-blocks schema core/buttons
```

## Copilot setup

This starter includes project-level Copilot instructions in:

```text
.github/copilot-instructions.md
```

When creating a new client theme repo, copy the `.github/` directory into the client theme repo and commit it. VS Code and GitHub Copilot will then load the project instructions for that repo.

Developers should also review their personal Copilot instructions and make sure they do not conflict with this project. Project instructions should be treated as the source of truth for native Gutenberg theme work.

## Recommended Copilot prompts

Convert HTML to editable Gutenberg pattern:

```text
Use wp-blockmarkup before answering. Convert this HTML section into a valid Gutenberg block pattern using core blocks only. Keep the content editable. Do not invent block attributes.
```

Check WordPress hook usage:

```text
Use wp-devdocs before answering. What is the correct WordPress/WooCommerce hook for this task? Then implement the smallest safe change.
```

Browser check:

```text
Use dev-playwright to open my local WordPress site and confirm the homepage loads without console errors.
```

Current third-party docs:

```text
Use Context7 before answering. Check the current docs for this package before making changes.
```

Figma-to-Gutenberg implementation:

```text
Use the Figma MCP to inspect the selected frame first. Translate the design into native Gutenberg block patterns using core blocks and theme.json presets. Put imported images in assets/img and imported icons in assets/icons. Rename imported files to descriptive kebab-case names before committing them.
```

## Theme development approach

Use the `theme/` folder as the starting block theme files only.

Do **not** add Local by Flywheel inside this template folder. Local by Flywheel creates the WordPress site. This starter repo provides the files that are copied into the client theme folder inside that Local WordPress site.

Think of the workflow as two separate things:

```text
1. WHG starter template = source files you copy from
2. Local by Flywheel site = actual WordPress install you build and test in
```

## Local by Flywheel client theme workflow

For each new client site:

1. Create a new WordPress site in Local by Flywheel.
2. Open the Local site files. On macOS, Local sites usually live in a path similar to:

```text
~/Local Sites/client-site-name/app/public/
```

3. Go to the WordPress themes directory:

```text
~/Local Sites/client-site-name/app/public/wp-content/themes/
```

4. Create a new folder for the client theme, for example:

```text
client-theme-name
```

5. Copy the **contents** of this starter repo's `theme/` folder into the new client theme folder.

The final client theme folder should look like this:

```text
client-theme-name/
├── style.css
├── functions.php
├── theme.json
├── templates/
├── parts/
├── patterns/
└── assets/
        ├── css/
        ├── icons/
        └── img/
```

Do not end up with this nested structure:

```text
client-theme-name/
└── theme/
    ├── style.css
    ├── functions.php
    └── theme.json
```

`style.css` must be directly inside the client theme folder so WordPress can detect the theme.

6. Copy the support files into the client theme folder if you want the client theme repo to include Copilot/MCP setup:

```text
.github/
.vscode/
scripts/
.nvmrc
README.md
```

7. Update `style.css` theme name, description, text domain, and metadata for the client project.
8. Update `theme.json` design tokens.
9. Add approved Figma or client assets to `assets/img` and `assets/icons`.
10. Activate the client theme in WordPress.
11. Build reusable page sections in `patterns/`.
12. Keep templates structural.
13. Put final client page copy inside WordPress pages unless a default template/pattern requires placeholder content.
14. Test in the WordPress editor and frontend.

## Figma to block theme workflow

Treat Figma as design source material and WordPress as the implementation target.

1. Inspect the relevant Figma frame before building or changing a section.
2. Move reusable design decisions into `theme.json` first: colours, font sizes, spacing sizes, layout widths, and typography defaults.
3. Build client-editable sections as Gutenberg block patterns in `patterns/`.
4. Use core blocks before adding custom HTML, CSS, PHP, or JavaScript.
5. Keep `/templates` structural and use `/parts` for shared site areas such as headers and footers.
6. Store imported images in `assets/img` and imported icons in `assets/icons`.
7. Rename imported image and icon files before committing them. Remove export-tool names and random layer names, and use descriptive kebab-case names such as `home-hero-engineer.webp`, `services-boiler-installation.webp`, or `contact-map-pin.svg`.
8. Do not commit files named like `figma-asset.png`, `figma-export.svg`, `image-1.png`, `group-42.svg`, or `rectangle-12.webp`.
9. Validate generated block markup with `wp-blockmarkup` where practical.
10. Check the WordPress editor and frontend after implementation.

## Pattern naming and page structure

Use patterns to break up pages and templates into reusable, client-editable sections. Templates should provide structure; patterns should hold the page sections.

Name pattern files and slugs using the format:

```text
page-section.php
whg-client-starter/page-section
```

Examples:

```text
home-hero.php
home-services.php
home-faqs.php
about-us-hero.php
about-us-services.php
contact-us-hero.php
contact-us-branches.php
archive-hero.php
post-hero.php
```

Each pattern file should include matching metadata:

```php
/**
 * Title: Home Hero
 * Slug: whg-client-starter/home-hero
 * Categories: whg-sections
 */
```

When turning a Figma page into WordPress, split it into section patterns first, then reference those patterns from templates or insert them into editor-managed pages.

## Test output and dumps

Screenshots, browser snapshots, exported accessibility trees, Playwright traces, DevTools logs, temporary HTML, and MCP test data must go in a local `dump/` directory at the repo root.

The `dump/` directory is ignored by Git and must not be committed. Keep only source files, theme assets, patterns, templates, and documented configuration in the repo.

## GitHub repo workflow

Only the client theme folder should be stored in Git. Do not commit the full Local by Flywheel WordPress site.

The Git repo should be created from the client theme folder:

```text
~/Local Sites/client-site-name/app/public/wp-content/themes/client-theme-name/
```

Do not create the Git repo from:

```text
~/Local Sites/client-site-name/
~/Local Sites/client-site-name/app/public/
```

Recommended Git setup from inside the client theme folder:

```bash
git init
git add .
git commit -m "Initial client theme setup"
git branch -M main
git remote add origin git@github.com:YOUR-GITHUB-ORG/client-theme-repo.git
git push -u origin main
```

If using GitHub Desktop:

1. Choose `File -> Add Local Repository`.
2. Select the client theme folder inside Local by Flywheel.
3. Publish that folder as a new private GitHub repo.

Generic example:

```text
Local site:
~/Local Sites/client-site-name/app/public/

Theme folder and Git repo:
~/Local Sites/client-site-name/app/public/wp-content/themes/client-theme-name/

GitHub repo:
client-theme-name
```

Summary:

```text
Create site in Local by Flywheel
        ↓
Create new theme folder inside wp-content/themes/
        ↓
Copy WHG starter theme files into that folder
        ↓
Activate theme in WordPress
        ↓
Initialise Git inside the theme folder
        ↓
Push that theme folder to GitHub
```

## Important Gutenberg note

Block theme files provide defaults. If a template or template part is edited in the WordPress Site Editor, WordPress may store that customised version in the database and override the file-based version. During development, keep GitHub/theme files as the source of truth unless the team intentionally exports editor changes back into the theme.
