module.exports = {
  purge: ['./**/*.php', './assets/js/src/**/*.js'],
  darkMode: false,
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      opacity: ['disabled'],
      textColor: ['visited'],
    },
  },
  plugins: [require('@tailwindcss/forms')],
};
