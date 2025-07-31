# eCabs Testimonials Plugin

A lightweight WordPress plugin to manage and display testimonials using a custom post type and shortcode.

## Features

- Custom post type for Testimonials
- Shortcode `[testimonials-carousel]` to display testimonials
- Basic frontend template 
- Easy styling via plugin or theme stylesheets

## Installation

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate the plugin through the WordPress **Plugins** menu.
3. Add testimonials from the **Testimonials** section in the admin.
4. Use the shortcode `[testimonials-carousel]` in any post or page to display them.

## Template Customization

The plugin uses a template file located at:

```/templates/testimonials-carousel-template.php```

## Styling

- The plugin includes a default stylesheet (`css/testimonials.css`).
- You can override or extend styles from your theme using standard CSS classes.
- Alternatively, enqueue your own stylesheet from your theme or child theme.


# 🛠️ Gulp Workflow for eCabs WordPress Theme Development

A streamlined Gulp setup to compile SCSS, minify JavaScript, and enable live reloading for WordPress theme development.

---

## 📁 Folder Structure

```
project-root/
├── src/
│   ├── scss/
│   │   └── testimonials.scss      # Testimonials SCSS file
│   └── js/                        # Custom JavaScript files
│   │   └── testimonials.js        # Testimonials Script file
├── css/                           # Compiled CSS output
│   └── third-party/               # Minified third-party CSS files                   
├── js/                            # Compiled JavaScript output
│   └── third-party/               # Minified third-party JS files         
├── gulpfile.js
├── package.json
└── README.md
```

---

## ✅ Features

- 🎨 Compile SCSS to minified CSS
- 🚀 Autoprefix for cross-browser compatibility
- 📉 Minify custom and third-party JavaScript
- 🔄 Live reload with BrowserSync
- 📁 Structured and maintainable task definitions

---

## 🔧 Requirements

- **Node.js** (v14 or later)
- **Gulp CLI** (installed globally)

```npm install --global gulp-cli```

---

## 🚀 Getting Started

1. Clone this repository and navigate into the plugin folder (ecabs-testimonials-plugin) directory.
2. Install dependencies:

```npm install```

3. Start the development environment:

```gulp```

---

## 📦 Gulp Tasks

| Command                     | Description                                                   |
|-----------------------------|---------------------------------------------------------------|
| `gulp`                      | Run all tasks and start development server with file watching |
| `gulp.customStyles`         | Compile page-specific SCSS files in `scss/` folder            |
| `gulp.thirdPartyStyles`     | Copy and minify third-party CSS files                         |
| `gulp.scripts`              | Minify custom JavaScript from `src/js/`                       |
| `gulp.thirdPartyScripts`    | Minify and move third-party JavaScript files                  |
| `gulp.serve`                | Start dev server with live reloading for SCSS, JS, and PHP    |

---
