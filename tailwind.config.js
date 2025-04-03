import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
                boldonse: ['Boldonse' , ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins' , ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto' , ...defaultTheme.fontFamily.sans],
                robotoflex: ['Roboto Flex' , ...defaultTheme.fontFamily.sans],
                
            },
            colors: {
                aapblue: '#151848'
            }
        },
    },

    plugins: [forms, require('@tailwindcss/container-queries')],
};
