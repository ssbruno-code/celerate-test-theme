import gulp from 'gulp';
const { task, src, dest, watch, series } = gulp;

const _stderrWrite = process.stderr.write.bind(process.stderr);
process.stderr.write = (chunk, enc, cb) => {
  const msg = Buffer.isBuffer(chunk) ? chunk.toString('utf8') : String(chunk);
  if (
    msg.includes('Deprecation [legacy-js-api]') ||
    msg.includes('https://sass-lang.com/d/legacy-js-api')
  ) {
    return true; // swallow it
  }
  return _stderrWrite(chunk, enc, cb);
};
// -

import gulpSass from 'gulp-sass';
import * as dartSass from 'sass-embedded';
import sourcemaps from 'gulp-sourcemaps';
import { deleteAsync } from 'del';
const { init, write } = sourcemaps;
import gulpUglify from 'gulp-uglify-es';
const uglify = gulpUglify.default;
import fs from 'fs';
import path from 'path';
import cssnano from 'gulp-cssnano';
const sassProcessor = gulpSass(dartSass);
process.env.SASS_SILENCE_DEPRECATIONS ??= 'legacy-js-api';
/**
 * Task to compile all SCSS files
 */
task('sass', async () => {
    src([
        'src/assets/scss/**/*.scss',
        'src/components/**/*.scss',
    ])
        .pipe(init())
        .pipe(
          sassProcessor({
            includePaths: ["src/assets/scss"],
            quietDeps: true
          })
        )
        .pipe(cssnano().on('error', (e) => console.error(e)))
        .pipe(write('.'))
        .pipe(dest('build/css'));
});

/**
 * Task to compile all JavaScript files
 */
task('js', async () => {
    src([
        'src/assets/js/**/*.js',
        'src/components/**/*.js',
    ])
        .pipe(init())
        .pipe(uglify().on('error', (e) => console.error(e)))
        .pipe(write('.'))
        .pipe(dest('build/js'));
});

/**
 * Default task to watch for changes in SCSS and JS files
 */
task('default', async () => {
    watch('src/**/*.js', series('js'));
    watch('src/**/*.scss', series('sass'));
});

/**
 * Task to delete the build directory
 */
task('del-build', async () => {
    await deleteAsync('build');
});

/**
 * Task to create a new component in the application
 */
task('new-component', async () => {
    // Extract the component name from the command line arguments
    const args = process.argv.slice(3);
    let componentName;

    // Check if the --name flag is present and extract the component name
    if (args.includes('--name')) {
        const nameFlagIndex = args.indexOf('--name');
        componentName = args[nameFlagIndex + 1];
    } else {
        throw new Error('You must provide the --name flag to specify the component name. Eg. gulp new-component --name project/my_component');
    }

    // Directory to store the new component
    const componentPath = `src/components/${componentName}`;

    // Create the component directory if it doesn't exist
    if (!fs.existsSync(componentPath)) {
        fs.mkdirSync(componentPath, { recursive: true });
    }

    // File contents for the .php, .scss, and .js files
    const phpContent = `<?php\n/**\n * @component       ${componentName}\n * @description     Add a description for the component\n*/\n\n$default_args = array("class" => "");\n$args = array_merge($default_args, $args ?? []);\n?>\n<div class="${componentName.replace(/(\/|_)/g, "-")} <?php echo $args['class']; ?>">\n\n</div>`;
    const scssContent = `// SCSS code for ${componentName} component\n@use "../../../assets/scss/variables" as *;\n\n.${componentName.replace(/(\/|_)/g, "-")} {\n\n}`;
    const jsContent = `// JavaScript code for ${componentName} component\n(($) => {\n\n     "use strict";\n     console.log("${componentName} scripts loaded...");\n\n})(jQuery);`;

    // Write the contents to the respective files
    fs.writeFileSync(path.join(componentPath, 'component.php'), phpContent);
    fs.writeFileSync(path.join(componentPath, 'styles.scss'), scssContent);
    fs.writeFileSync(path.join(componentPath, 'scripts.js'), jsContent);

    // Log a success message in green
    console.log('\x1b[32m', `Component ${componentName} created successfully!`);
});

/**
 * Build task to compile all SCSS and JS files
 */
task('build', series('del-build', 'sass', 'js'));