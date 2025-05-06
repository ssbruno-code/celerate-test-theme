# Celerate Test Theme

A modern, component‑driven WordPress theme that compiles its front‑end assets with **Gulp 4** and embraces a clean *src → build* workflow. This README explains how to install the tooling, run the compilation tasks, and understand the project structure so you can jump straight into development.

---

## Requirements

| Tool       | Version (minimum) | Why                                                         |
| ---------- | ----------------- | ----------------------------------------------------------- |
| Node.js    | 18 LTS            | Executes Gulp & front‑end tooling                           |
| npm / yarn | Latest            | Package management                                          |
| gulp‑cli   | 2.x               | Global command for running gulp tasks (`npm i -g gulp-cli`) |
| PHP        | 8.1               | WordPress + theme classes                                   |
| Composer   | 2.x               | Installs PHP dependencies in `/vendor`                      |
| WordPress  | 6.0+              | Target CMS                                                  |

> **Tip:** The theme was tested on Node ˃ 18. If you use **nvm** you can run `nvm use` inside the folder to match the required version.

---

## Installation

```bash
# 1. Clone the repository into /wp-content/themes
$ git clone git@github.com:your-org/celerate-test-theme.git

# 2. Install JavaScript dependencies
$ cd celerate-test-theme && npm install

# 3. Install PHP dependencies
$ composer install

# 4. Activate the theme inside the WordPress dashboard
```

---

## Gulp Tasks & Asset Pipeline

| Task                   | Command                                       | Description                                                                                                                                                               |
| ---------------------- | --------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Styles**             | `gulp sass`                                   | Compiles every SCSS file in `src/assets/scss/` **and** `src/components/**`, creates source‑maps, minifies with *cssnano*, and outputs to `build/css/`.                    |
| **Scripts**            | `gulp js`                                     | Minifies every JS file in `src/assets/js/` **and** `src/components/**` with *uglify‑es*, adds source‑maps, and outputs to `build/js/`.                                    |
| **Clean**              | `gulp del-build`                              | Deletes the entire `build/` directory.                                                                                                                                    |
| **Build**              | `gulp build`                                  | Runs `del-build`, `sass`, and `js` sequentially – perfect for CI/CD.                                                                                                      |
| **Watch (dev)**        | `gulp`                                        | Default task. Watches **.scss** and **.js** inside `src/` and recompiles on the fly.                                                                                      |
| **Scaffold Component** | `gulp new-component --name path/my_component` | Quickly generates a new component folder with ready‑to‑edit `component.php`, `styles.scss`, and `scripts.js`. Nested folders are allowed (e.g. `acf_blocks/hero-banner`). |

All CSS/JS files are written once inside **`build/`** and are the only assets enqueued by the theme in production – keeping the repository clean and deploy‑ready.

---

## Theme Structure (high‑level)

```
celerate-test-theme/
├─ build/            # Compiled & minified assets (auto‑generated)
├─ classes/          # Autoloaded PHP classes (Admin, PublicSite, etc.)
├─ page-templates/   # WordPress page templates
├─ single-templates/ # WordPress single‑post templates
├─ src/              # Primary development folder ↓
│  ├─ assets/        # Global SCSS, JS & images
│  │  ├─ scss/
│  │  ├─ js/
│  │  └─ images/
│  ├─ components/    # Reusable view components
│  │  ├─ acf_blocks/ # ACF Gutenberg blocks
│  │  └─ templates/  # Site‑wide templates (header, footer, 404 …)
│  └─ templates/     # Twig/PHP templates compiled to components
├─ vendor/           # Composer packages (autoloaded)
├─ gulpfile.mjs      # Build system – see above
├─ package.json      # JS dependencies & npm scripts
├─ composer.json     # PHP dependencies & PSR‑4 autoload map
└─ style.css         # Theme header (required by WP)
```

### Components & ACF Blocks

Every component lives in its own directory under `src/components/` and follows the same triad:

```
my-component/
├─ component.php  # Markup + PHP logic (rendered via \Classes\Functions\Utils)
├─ styles.scss    # Isolated SCSS (import shared partials as needed)
└─ scripts.js     # Behaviour scoped to the component
```

Running `gulp sass` and `gulp js` will automatically detect, compile, and place the outputs into matching sub‑folders inside `build/css` and `build/js` for clean separation.

---

## Workflow Tips

1. **Development:** Run `gulp` in one terminal. As you edit SCSS & JS, assets rebuild and WordPress auto‑reloads (if you use LiveReload/BrowserSync).
2. **Production build:** Run `gulp build` before committing or in your deployment pipeline to ensure the `build/` folder is fresh.
3. **Creating a block/component:**

   ```bash
   gulp new-component --name acf_blocks/cta-with-image
   ```

   The task creates the directory structure and logs a success message in bright green 💚.
4. **Enqueueing assets:** Only reference the files inside `/build` from your PHP classes – never the raw `src` files.

---

## Contributing

* Fork → Branch → Commit (conventional commits recommended) → PR.
* Adhere to the WordPress PHP Coding Standards (`composer phpcs`).
* Write docblocks for **every** public function/method.

---

