const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: {
                'height': 'height'
              }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
            height: ['responsive', 'hover', 'focus']
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
