const { parallel, series } = require('gulp');
const scripts = require('./tasks/scripts');
const styles = require('./tasks/styles');
const { browser } = require('./tasks/browser');
const watcher = require('./tasks/watcher');
const favicon = require('./tasks/favicon');
const emails = require('./tasks/emails');

exports.browser = browser;
exports.styles = styles;
exports.scripts = scripts;
exports.watcher = watcher;
exports.favicon = favicon;
exports.emails = emails;
exports.default = series(scripts, styles, parallel(browser, watcher));
