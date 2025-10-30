# NeptuneTV WordPress Theme

Custom WordPress theme that recreates the look-and-feel of neptunetv and introduces a flexible outdoor product catalog.

## Highlights

- Pixel-inspired landing page with hero, feature highlights, testimonials, and CTA sections
- Custom post type **Neptune Products** with taxonomy-based catalog navigation
- Product detail layout featuring key features list, specification block, and related products
- Shortcode `[neptune_product_catalog]` for embedding product grids anywhere
- Customizer controls for the announcement bar and hero messaging
- Responsive design with mobile navigation drawer and custom call-to-action buttons

## Getting started

1. Install the theme by copying `wp-content/themes/neptunetv` into your WordPress installation.
2. Activate **NeptuneTV** from the Appearance → Themes screen.
3. Navigate to **Products → Add New** to create Neptune Outdoor TV entries. Assign categories to organize the catalog.
4. Visit **Appearance → Customize** to update the announcement bar, hero copy, CTA buttons, and background image.
5. Create or edit the homepage and assign the “Front page” display under **Settings → Reading**.

### Shortcode usage

```
[neptune_product_catalog columns="3" category="full-sun" limit="6"]
```

Parameters:
- `columns`: `1`-`4` (default `3`)
- `category`: Slug(s) of `Product Categories` taxonomy, comma-separated for multiple
- `limit`: Number of products (`-1` shows all)
- `orderby` / `order`: Standard WP_Query ordering arguments (defaults to `menu_order` / `ASC`)

## Theme structure

```
wp-content/themes/neptunetv/
├── assets/
│   ├── css/main.css
│   ├── images/hero.png
│   └── js/main.js
├── inc/
│   ├── assets.php
│   ├── custom-post-types.php
│   ├── customizer.php
│   ├── meta-boxes.php
│   ├── setup.php
│   ├── shortcodes.php
│   └── template-tags.php
├── template-parts/content-product-card.php
├── archive-ntv_product.php
├── front-page.php
├── functions.php
├── header.php
├── footer.php
├── index.php
├── page.php
├── single.php
└── single-ntv_product.php
```

## Requirements

- WordPress 5.8+
- PHP 7.4+

