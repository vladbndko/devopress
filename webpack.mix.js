const mix = require('laravel-mix');
require('dotenv').config();

mix
  .setPublicPath('./')
  .js('resources/scripts/main.js', 'script.js')
  .sass('resources/styles/main.scss', 'style.css')
  .disableSuccessNotifications()
  .version()
  .options({
    processCssUrls: false,
    autoprefixer: { remove: false },
    terser: {
      extractComments: false,
    },
  });

if (!mix.inProduction()) {
  mix
    .sourceMaps()
    .webpackConfig({ devtool: 'inline-source-map' })
    .browserSync({
      proxy: process.env.APP_URL,
      notify: false,
      open: false,
      files: ['**/*.php', 'style.css', 'script.js'],
    });
}
