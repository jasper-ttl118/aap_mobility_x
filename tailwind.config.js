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
            keyframes: {
                wiggle: {
                    '0%, 100%': { transform: 'rotate(-12deg)' },
                    '50%': { transform: 'rotate(12deg)' },
                },
                fadeInUp: {
                    '0%': { opacity: 0, transform: 'translateY(20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                }
            },

            animation: {
                wiggle: 'wiggle 0.5s ease-in-out infinite',
                fadeInUp: 'fadeInUp 0.5s ease-out',
            },

            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
                boldonse: ['Boldonse', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto', ...defaultTheme.fontFamily.sans],
                robotoflex: ['Roboto Flex', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                aapblue: '#151848',
            },
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/container-queries'),
        require('daisyui'),
    ],

    daisyui: {
        themes: false,
        darkTheme: false,
    },
};
