const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                my_blue:"#247BAO",
                my_green:"#70C1B3",
                my_green2:"#B2DBBF",
                my_yellow:"#F3FFBD",
                my_red:"FF1654",
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
