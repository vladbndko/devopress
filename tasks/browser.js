const config = require('../devopress.config');
const browserSync = require('browser-sync').create();

module.exports = {
  browser: function (done) {
    browserSync.init({
      proxy: config.host,
      port: 9090,
      ghostMode: {
        clicks: false,
      },
      notify: false,
      online: true,
      tunnel: config.name, // Attempt to use the URL https://devopress.loca.lt
    });
    done();
  },
  browserSync,
};
