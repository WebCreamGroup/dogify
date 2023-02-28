const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/vue-tailwind-datepicker/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                'vtd-primary': colors.sky,
                'vtd-secondary': colors.gray,
            },
        },
    },
    plugins: [
        require('daisyui'),
    ],
    daisyui: {
        styled: true,
        themes: ['emerald'],
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: '',
        darkTheme: 'aqua',
    },
}
