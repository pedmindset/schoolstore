const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  theme: {
    extend: {
      colors: {
        'transparent': 'transparent',
        'black': '#22292f',
        'white': '#ffffff',
        'grey': '#b8c2cc',
        'grey-light': '#dae1e7',
          'light-blue': {
            100: '#E7F4FC',
            200: '#C2E5F8',
            300: '#9ED5F3',
            400: '#55B5EB',
            500: '#0C95E2',
            600: '#0B86CB',
            700: '#075988',
            800: '#054366',
            900: '#042D44',
            },
        },
        screens: {
         
        },
        fontFamily: {
          sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        },
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui')({
      layout: 'sidebar',
    })
  ],
}
