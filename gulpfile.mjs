import gulp from 'gulp';
const { task, src, dest, watch, series } = gulp;

import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
const { init, write } = sourcemaps;
import { deleteAsync } from 'del';
import gulpUglify from 'gulp-uglify-es';
const uglify = gulpUglify.default;
import * as dartSass from 'sass';
const sassProcessor = sass(dartSass);
import fs from 'fs';
import path from 'path';
import cssnano from 'gulp-cssnano';


task('sass', async () => {
    src([
        'src/assets/scss/**/*.scss',
        'src/components/**/*.scss',
    ])
        .pipe(init())
        .pipe(sassProcessor({
            includePaths: [
                "src/assets/scss",
            ]
        }).on('error', (e) => console.error(e)))
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
 * Clean
 */
task('del-build', async () => {
  await deleteAsync('build');
});

/**
 * Component scaffolder
 */
task('new-component', async () => {
  const args = process.argv.slice(3);
  let componentName;

  if (args.includes('--name')) {
    const nameFlagIndex = args.indexOf('--name');
    componentName = args[nameFlagIndex + 1];
  } else {
    throw new Error('You must provide the --name flag to specify the component name. Eg. gulp new-component --name project/my_component');
  }

  const componentPath = `src/components/${componentName}`;
  if (!fs.existsSync(componentPath)) {
    fs.mkdirSync(componentPath, { recursive: true });
  }

  const safeClass = componentName
    .replace(/[\/\\_\s]+/g, '-')
    .replace(/[^a-zA-Z0-9-]+/g, '-')
    .replace(/-+/g, '-')
    .replace(/^-|-$/g, '')
    .toLowerCase();

  const phpContent = `<?php
/**
 * @component       ${componentName}
 * @description     Add a description for the component
*/
$default_args = array("class" => "");
$args = array_merge($default_args, $args ?? []);
?>
<div class="${safeClass} <?php echo $args['class']; ?>">

</div>`;

  const scssContent = `// SCSS code for ${componentName} component
@use "../../assets/scss/variables" as *;

.${safeClass} {

}`;

  const jsContent = `// JavaScript code for ${componentName} component
(($) => {

  "use strict";
  console.log("${componentName} scripts loaded...");

})(jQuery);`;

  fs.writeFileSync(path.join(componentPath, 'component.php'), phpContent);
  fs.writeFileSync(path.join(componentPath, 'styles.scss'), scssContent);
  fs.writeFileSync(path.join(componentPath, 'scripts.js'), jsContent);

  console.log('\x1b[32m', `Component ${componentName} created successfully!`);
});

/**
 * Build (unchanged)
 */
task('build', series('del-build', 'sass', 'js'));
