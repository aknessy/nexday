const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'sora': ['Sora', ...defaultTheme.fontFamily.sans],
                'heading': ['"Playfair Display"', ...defaultTheme.fontFamily.sans]
            },
            backgroundImage: {
                'fav-img': "url('../imgs/nexday-fav-ui.png')"
            },
            backgroundColor: {
                'teal-gradient-stop1': '#184E68',
                'teal-gradient-stop2': '#57CA85'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
