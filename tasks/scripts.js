const { src, dest } = require('gulp');
const webpack = require('webpack-stream');
const rename = require('gulp-rename');

const { browserSync } = require('./browser');

module.exports = function scripts() {
  return src('assets/js/src/main.js')
    .pipe(
      webpack({
        mode: 'production',
        module: {
          rules: [
            {
              test: /\.(js)$/,
              exclude: /(node_modules)/,
              loader: 'babel-loader',
              query: {
                presets: ['@babel/env'],
                plugins: ['babel-plugin-root-import'],
              },
            },
          ],
        },
      }),
    )
    .on('error', function handleError() {
      this.emit('end');
    })
    .pipe(rename('theme.min.js'))
    .pipe(dest('assets/js/dist'))
    .pipe(browserSync.stream());
};
