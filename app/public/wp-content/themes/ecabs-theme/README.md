# eCabs Custom Theme

## 📄 Website Basic Building Blocks
This theme includes the basic building blocks for the eCabs website, such as the header, footer, and generic styles.

## 📄 Custom Page Templates

This theme includes two custom page templates for improved content control:

### 1. **Product Page Template**

- Utilizes **ACF** for dynamically populated product content.
- Includes a **hardcoded shortcode** for a testimonials carousel (ensure that **eCabs Testimonials** plugin is installed and activated).
- Testimonials are sourced from a **custom post type** (`testimonials`) created within the theme, allowing easy management from the WP dashboard.

---

### 2. **Contact Page Template**

- Page content is editable via the WordPress page editor.
- The **Contact Form 7 shortcode** is hardcoded into the PHP template to render the contact form.

---


# 🛠️ Gulp Workflow for eCabs WordPress Theme Development

A streamlined Gulp setup to compile SCSS, minify JavaScript, and enable live reloading for WordPress theme development.

---

## 📁 Folder Structure

```
project-root/
├── src/
│   ├── scss/
│   │   ├── style.scss             # Main theme stylesheet
│   │   └── pages/                 # Page-specific SCSS files
│   └── js/                        # Custom JavaScript files
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

1. Clone this repository and navigate into the project (ecabs-theme) directory.
2. Install dependencies:

```npm install```

3. Start the development environment:

```gulp```

---

## 📦 Gulp Tasks

| Command                     | Description                                                   |
|-----------------------------|---------------------------------------------------------------|
| `gulp`                      | Run all tasks and start development server with file watching |
| `gulp.themeStyles`          | Compile `style.scss` to minified CSS                          |
| `gulp.pageStyles`           | Compile page-specific SCSS files in `pages/` folder           |
| `gulp.thirdPartyStyles`     | Copy and minify third-party CSS files                         |
| `gulp.scripts`              | Minify custom JavaScript from `src/js/`                       |
| `gulp.thirdPartyScripts`    | Minify and move third-party JavaScript files                  |
| `gulp.serve`                | Start dev server with live reloading for SCSS, JS, and PHP    |

---

## 🔌 Required WordPress Plugins

To ensure full functionality of this theme, please install and activate the following plugins:

### 1. **Advanced Custom Fields**  
Enhance content flexibility using custom fields.  
🔗 [View on WordPress.org](https://wordpress.org/plugins/advanced-custom-fields/)

> ⚠️ *Note: ACF Pro includes a Repeater field that would allow dynamic content sections. This project is limited to three fixed sections due to the lack of access to the Pro version.*

---

### 2. **Contact Form 7**  
Create and manage contact forms easily.  
🔗 [View on WordPress.org](https://wordpress.org/plugins/contact-form-7/)

> ⚠️ *Note: Gravity Forms is the preferred solution due to its advanced capabilities, but Contact Form 7 was used because no Gravity Forms license was available at the time.*

---

### 3. **Flamingo**  
Store Contact Form 7 submissions in the WordPress admin dashboard.  
🔗 [View on WordPress.org](https://wordpress.org/plugins/flamingo/)

> 💡 You can install these plugins via **Plugins → Add New** in the WordPress admin panel or download them using the links above.

### 4. **Contact Form 7 Apps**  
Adds spam prevention and additional features to Contact Form 7, including a **honeypot** field to block bots.  
🔗 [View on WordPress.org](https://wordpress.org/plugins/contact-form-7-apps/)

> 🛡️ *This plugin is used specifically for its honeypot feature to reduce spam.*

---

### 5. **Wordfence Security**  
Comprehensive security plugin offering firewall protection, malware scanning, and login attempt monitoring.  
🔗 [View on WordPress.org](https://wordpress.org/plugins/wordfence/)

> 🔒 *Used to secure the site from common threats and brute-force login attempts.*

---

## ⚡ Perfornmance and Security Considerations

The theme has been optimized for performance with the following practices:

- 🧩 **Lightweight Custom Theme**  
  Built from scratch to avoid the bloat of multipurpose themes.

- 🚫 **No Page Builders**  
  This theme was developed without the use of any page builders (e.g., Elementor, WPBakery) to ensure optimal performance and avoid unnecessary bloat.

- 🧼 **Minified Assets**  
  All CSS and JS files are minified via Gulp to reduce file size and improve performance.

- 🖼️ **Optimized Images**  
  All theme images are compressed and resized using **[Squoosh](https://squoosh.app/)** and kept under 100KB when possible for faster load times.

- 🔠 **Font Optimization** *(Recommended)*  
  Self-host fonts to reduce external requests and improve first paint performance, especially above-the-fold.

- 💾 **Caching Strategy** *(Recommended)*  
  For production environments, integrate a caching plugin like **[WP Rocket](https://wp-rocket.me/)** to benefit from:

  - Page and browser caching  
  - GZIP compression  
  - Lazy loading for media  
  - Database cleanup  
  - JavaScript preloading and deferment  

- 🕵️‍♂️ **Google reCAPTCHA** *(Essential for Live Sites)*
   Integrate Google reCAPTCHA with your contact forms to prevent spam and automated abuse in production environments.