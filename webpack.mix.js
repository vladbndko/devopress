const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-mjml');
require('laravel-mix-purgecss');

mix
  .setPublicPath('./')
  .sass('./assets/styles/style.scss', './')
  .tailwind('./tailwind.config.js')
  .purgeCss({
    content: ['./**/*.php', './assets/**/*.js'],
  })
  .js('./assets/scripts/main.js', './script.js')
  .mjml('inc/emails/templates/src', 'inc/emails/templates', {
    extension: '.php',
  })
  .browserSync({
    proxy: 'devopress.local',
    notify: false,
    files: ['./**/*.php', './style.css', './script.js'],
  })
  .disableSuccessNotifications()
  .version()
  .options({
    processCssUrls: false,
    sassOptions: {
      outputStyle: 'nested',
    },
    autoprefixer: { remove: false },
    terser: {
      extractComments: false,
    },
  });

if (!mix.inProduction()) {
  mix.sourceMaps();
  mix.webpackConfig({ devtool: 'inline-source-map' });
}
