# 🛠️ Gulp Workflow for eCabs WordPress Theme Development

A streamlined Gulp setup to compile SCSS, minify JavaScript, and enable live reloading for WordPress theme development.

---

## 📁 Folder Structure

```
project-root/
├── src/
│   ├── scss/
│   │   ├── style.scss            # Main theme stylesheet
│   │   └── pages/                # Page-specific SCSS
│   └── js/                       # Custom JavaScript files
├── css/                          # Compiled CSS
│   └── third-party/              # Minified third-party CSS                   
├── js/                           # Compiled JS
│   └── third-party/              # Minified third-party JS           
├── gulpfile.js
├── package.json
└── README.md
```

---

## ✅ Features

- 🧵 Compile SCSS to minified CSS
- 🚀 Autoprefix for cross-browser compatibility
- 🔧 Minify custom and third-party JS
- 🔄 Live reload with BrowserSync
- 📐 Structured and maintainable task definitions

---

## 🔧 Requirements

- Node.js (v14 or later)
- Gulp CLI installed globally:

```bash
npm install --global gulp-cli
```

---

## 🚀 Getting Started

1. Clone this repository and navigate to the project directory.

2. Install dependencies:

```bash
npm install
```

3. Start the development environment:

```gulp```

## 📦 Gulp Tasks

| Command                      | Description                                               |
|-----------------------------|-----------------------------------------------------------|
| `gulp`                      | Run all tasks and start dev server with file watching     |
| `gulp.themeStyles`          | Compile `style.scss` to minified CSS                     |
| `gulp.pageStyles`           | Compile SCSS files from `pages/` folder                  |
| `gulp.thirdPartyStyles`     | Copy and minify third-party CSS                          |
| `gulp.scripts`              | Minify custom JavaScript from `src/js/`                  |
| `gulp.thirdPartyScripts`    | Minify and move third-party JavaScript                   |
| `gulp.serve`                | Start dev server and reload on SCSS, JS, or PHP changes  |

---

## 📄 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).
