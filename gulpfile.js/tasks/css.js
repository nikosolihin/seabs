var config       = require('../config')
if(!config.tasks.css) return

var gulp         = require('gulp')
var gulpif       = require('gulp-if')
var browserSync  = require('browser-sync')
var sass         = require('gulp-sass')
var postcss      = require('gulp-postcss')
var sourcemaps   = require('gulp-sourcemaps')
var handleErrors = require('../lib/handleErrors')
var path         = require('path')

// PostCSS processors
var short           = require('postcss-short')
var clearfix        = require('postcss-clearfix')
var position        = require('postcss-position')
var flexbox         = require('postcss-flexbox')
var flexbugs        = require('postcss-flexbugs-fixes')
var quantityQueries = require('postcss-quantity-queries')
var autoprefixer    = require('autoprefixer')(config.tasks.css.autoprefixer)
var cssnano         = require('cssnano')

var paths = {
  src: path.join(config.root.src, config.tasks.css.src, '/**/*.{' + config.tasks.css.extensions + '}'),
  dest: path.join(config.root.dest, config.tasks.css.dest)
}

var cssTask = function () {

  var processors = [
    short,
    clearfix,
    position,
    flexbox,
    flexbugs,
    quantityQueries,
    autoprefixer,
    cssnano
  ]

  return gulp.src(paths.src)
    .pipe(gulpif(!global.production, sourcemaps.init()))
    .pipe(sass(config.tasks.css.sass))
    .on('error', handleErrors)
    .pipe(postcss( processors )).on('error', handleErrors)
    .pipe(gulpif(!global.production, sourcemaps.write()))
    .pipe(gulp.dest(paths.dest))
    // .pipe(browserSync.stream())
    .on('end', browserSync.reload)
}

gulp.task('css', cssTask)
module.exports = cssTask
