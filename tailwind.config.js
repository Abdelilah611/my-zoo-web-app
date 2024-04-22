/** @type {import('tailwindcss').Config} */

const plugin = require('tailwindcss/plugin')

module.exports = {
  content: ['./assets/**/*.js', './templates/**/*.html.twig'],
  theme: {
    extend: {
      colors: {
        myWhite: '#FCFBF7',
        primGreen: '#1F5906',
        secBrown: '#73370D',
      },
      textShadow: {
        sm: '0 1px 2px var(--tw-shadow-color)',
        DEFAULT: '0 4px 4px var(--tw-shadow-color)',
        lg: '0 8px 12px var(--tw-shadow-color)',
      },
    },
    fontFamily: {
      header: ['"Aclonica", sans-serif'],
      body: ['Optima, Candara, "Noto Sans", source-sans-pro, sans-serif;'],
    },
  },
  plugins: [
    plugin(function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          'text-shadow': (value) => ({
            textShadow: value,
          }),
        },
        { values: theme('textShadow') }
      )
    }),
  ],
}
