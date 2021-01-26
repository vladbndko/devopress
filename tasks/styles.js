const { src, dest } = require('gulp');
const sass = require('gulp-sass');
const sassGlob = require('gulp-sass-glob');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');

const { browserSync } = require('./browser');

module.exports = function styles() {
  return src('assets/styles/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass())
    .pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true }))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write())
    .pipe(dest('./'))
    .pipe(browserSync.stream());
};
