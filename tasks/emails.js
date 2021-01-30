const fs = require('fs');
const path = require('path');
const mjml2html = require('mjml');

const src = path.resolve(__dirname, '../inc/emails/templates/src');
const dist = path.resolve(__dirname, '../inc/emails/templates');

const options = {
  minifyOptions: {
    collapseWhitespace: true,
    minifyCSS: true,
    removeEmptyAttributes: true,
  },
};

module.exports = function (done) {
  const templates = fs.readdirSync(src);
  templates.forEach((file) => {
    const extension = path.extname(file);
    const basename = path.basename(file, extension);
    const templateRaw = fs.readFileSync(path.resolve(src, file), 'utf8');
    const templateHtml = mjml2html(templateRaw, options);
    fs.writeFileSync(path.resolve(dist, `${basename}.php`), templateHtml.html);
  });
  done();
};
