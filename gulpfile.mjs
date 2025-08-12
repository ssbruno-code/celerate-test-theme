import gulp from 'gulp';
const { task, src, dest, watch, series } = gulp;

// (Optional) keep other Sass deprecation noise quiet
const _stderrWrite = process.stderr.write.bind(process.stderr);
process.stderr.write = (chunk, enc, cb) => {
  const msg = Buffer.isBuffer(chunk) ? chunk.toString('utf8') : String(chunk);
  if (msg.includes('Deprecation [legacy-js-api]') || msg.includes('https://sass-lang.com/d/legacy-js-api')) {
    return true; // swallow just that deprecation
  }
  return _stderrWrite(chunk, enc, cb);
};
import sourcemaps from 'gulp-sourcemaps';
const { init, write } = sourcemaps;
import { deleteAsync } from 'del';
import gulpUglify from 'gulp-uglify-es';
const uglify = gulpUglify.default;
import fs from 'fs';
import gulpIf from 'gulp-if';
import path from 'path';
import cssnano from 'gulp-cssnano';

import through2 from 'through2';
import applySourceMap from 'vinyl-sourcemaps-apply';
import * as sass from 'sass-embedded';

/** Embedded Sass transform (no legacy API), with sourcemaps */
function sassEmbedded(options = {}) {
  const loadPaths = options.loadPaths || [];
  const style = options.style || 'expanded';
  const quietDeps = options.quietDeps ?? true;

  return through2.obj(function (file, _, cb) {
    if (file.isNull) return cb(null, file);
    if (file.isStream) return cb(new Error('Streaming not supported'));

    // ignore partials as entrypoints
    if (path.basename(file.path).startsWith('_')) return cb();

    sass.compileAsync(file.path, {
      loadPaths: [...loadPaths, path.dirname(file.path)],
      style,
      sourceMap: true,
      quietDeps
    }).then(result => {
      file.contents = Buffer.from(result.css);
      file.path = file.path.replace(/\.scss$/, '.css');

      if (file.sourceMap && result.sourceMap) {
        const map = typeof result.sourceMap === 'string'
          ? JSON.parse(result.sourceMap)
          : JSON.parse(result.sourceMap.toString());
        applySourceMap(file, map);
      }
      cb(null, file);
    }).catch(err => cb(err));
  });
}

/** SCSS -> CSS (same globs and dest as before) */
task('sass', async () => {
  return src([
      'src/assets/scss/**/*.scss',
      'src/components/**/*.scss',
      '!src/**/_*.scss',              // <-- don’t stream partials
    ])
    .pipe(init())
    .pipe(sassEmbedded({
      loadPaths: ['src/assets/scss'],
      style: 'expanded',
      quietDeps: true
    }))
    // only minify compiled CSS files (never raw .scss)
    .pipe(gulpIf((file) => path.extname(file.path) === '.css',
      cssnano().on('error', (e) => console.error(e))
    ))
    .pipe(write('.'))
    .pipe(dest('build/css'));
});

/** JS (unchanged) */
task('js', async () => {
  return src([
      'src/assets/js/**/*.js',
      'src/components/**/*.js',
    ])
    .pipe(init())
    .pipe(uglify().on('error', (e) => console.error(e)))
    .pipe(write('.'))
    .pipe(dest('build/js'));
});

/** Watch */
task('default', async () => {
  watch('src/**/*.js', series('js'));
  watch('src/**/*.scss', series('sass'));
});

/** Clean */
task('del-build', async () => {
  await deleteAsync('build');
});

/**
 * Task to create a new component in the application
 * Usage: gulp new-component --name templates/hero_banner
 *        gulp new-component --name acf_blocks\feature-grid   (Windows also OK)
 */
task('new-component', async () => {
  const args = process.argv.slice(3);
  const nameFlagIndex = args.indexOf('--name');
  if (nameFlagIndex === -1 || !args[nameFlagIndex + 1]) {
    throw new Error('You must provide --name. Eg. gulp new-component --name templates/hero_banner');
  }

  const rawName = String(args[nameFlagIndex + 1]).trim();

  // Build a safe path under src/components, honoring nested folders
  const segments = rawName.split(/[\/\\]+/).filter(Boolean);
  const componentPath = path.join('src', 'components', ...segments);

  // Build a safe class name: replace /, \, _, spaces with "-", lowercase, collapse dashes
  const className = rawName
    .replace(/[\/\\_\s]+/g, '-')  // slashes, underscores, spaces -> -
    .replace(/[^a-zA-Z0-9-]+/g, '-') // strip other weird chars
    .replace(/-+/g, '-')          // collapse multiple -
    .replace(/^-|-$/g, '')        // trim leading/trailing -
    .toLowerCase();

  // Ensure dir exists
  fs.mkdirSync(componentPath, { recursive: true });

  const phpContent = `<?php
/**
 * @component       ${rawName}
 * @description     Add a description for the component
*/
$default_args = array("class" => "");
$args = array_merge($default_args, $args ?? []);
?>
<div class="${className} <?php echo $args['class']; ?>">

</div>`;

  const scssContent = `// SCSS code for ${rawName} component
@use "../../../assets/scss/variables" as *;

.${className} {

}`;

  const jsContent = `// JavaScript code for ${rawName} component
(($) => {

  "use strict";
  console.log("${rawName} scripts loaded...");

})(jQuery);`;

  fs.writeFileSync(path.join(componentPath, 'component.php'), phpContent);
  fs.writeFileSync(path.join(componentPath, 'styles.scss'), scssContent);
  fs.writeFileSync(path.join(componentPath, 'scripts.js'), jsContent);

  console.log('\x1b[32m', `Component ${rawName} created successfully at ${componentPath}!`);
});
/** Build */
task('build', series('del-build', 'sass', 'js'));
