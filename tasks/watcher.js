const { watch } = require('gulp');
const scripts = require('./scripts');
const styles = require('./styles');
const { browserSync } = require('./browser');

module.exports = function watcher() {
  watch('assets/styles/**/*.scss', {}, styles);
  watch('assets/js/src/**/*.js', {}, scripts);
  watch('**/*.php', browserSync.reload);
};
