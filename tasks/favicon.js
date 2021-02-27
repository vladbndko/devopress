const { src, dest, series } = require('gulp');
const raster = require('gulp-raster');
const rename = require('gulp-rename');
const ico = require('gulp-to-ico');
const svgScaler = require('svg-scaler');

const path = {
  srcSVG: 'assets/images/raw/favicon.svg',
  srcPNG: 'assets/images/raw/favicon.png',
  dest: 'assets/images/favicon',
};

function f192() {
  return src(path.srcSVG)
    .pipe(raster({ scale: 1.1875 }))
    .pipe(rename({ basename: '192x192', extname: '.png' }))
    .pipe(dest(path.dest));
}

function f512() {
  return src(path.srcSVG)
    .pipe(raster({ scale: 0.5 }))
    .pipe(rename({ basename: '512x512', extname: '.png' }))
    .pipe(dest(path.dest));
}

function apple() {
  return src(path.srcSVG)
    .pipe(raster({ scale: 0.17578125 }))
    .pipe(rename({ basename: 'apple', extname: '.png' }))
    .pipe(dest(path.dest));
}
function svg() {
  return src(path.srcSVG)
    .pipe(svgScaler({ scale: 0.125 }))
    .pipe(rename({ basename: 'icon', extname: '.svg' }))
    .pipe(dest(path.dest));
}

function icon() {
  return src(path.srcPNG)
    .pipe(ico('favicon.ico', { resize: true, sizes: [32] }))
    .pipe(dest(path.dest));
}

module.exports = series(f192, f512, apple, icon, svg);
