module.exports = {
  important: true,
  corePlugins: {
    preflight: false
  },
  purge: ['./src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['poppins', 'system-ui']
    },
    extend: {
      height: {
        'scroller-height': 'calc(700px - 88px)'
      },
      transitionProperty: {
        rounding: 'border-radius'
      },
      colors: {
        'wc-green': '#3fa649',
        'wc-blue-light': '#214559',
        'wc-blue': '#0a3148',
        'wc-blue-button': '#183d52',
        'wc-grey': '#edf1f4'
      }
    }
  },
  variants: {
    extend: {
      borderRadius: ['hover', 'focus'],
      backgroundColor: ['odd']
    }
  },
  plugins: []
}
