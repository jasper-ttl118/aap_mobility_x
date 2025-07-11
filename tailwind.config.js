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
        // screens: {
        //     'xs': '375px',
        //     'sm': '540px',
        //     'md': '768px',
        //     'lg': '1024px',
        //     'xl': '1280px',
        //     '2xl': '1536px',
        // },

        extend: {
            keyframes: {
                wiggle: {
                    '0%, 100%': { transform: 'rotate(-12deg)' },
                    '50%': { transform: 'rotate(12deg)' },
                },
                fadeInUp: {
                    '0%': { opacity: 0, transform: 'translateY(20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                },
                pulseScale: {
                    '0%, 100%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.1)' },
                },
                shake: {
                    '0%': { transform: 'rotate(0deg)' },
                    '5%': { transform: 'rotate(-1.5deg)' },
                    '10%': { transform: 'rotate(1.5deg)' },
                    '15%': { transform: 'rotate(-1.25deg)' },
                    '20%': { transform: 'rotate(1.25deg)' },
                    '25%': { transform: 'rotate(-1deg)' },
                    '30%': { transform: 'rotate(1deg)' },
                    '35%': { transform: 'rotate(-0.75deg)' },
                    '40%': { transform: 'rotate(0.75deg)' },
                    '45%': { transform: 'rotate(-0.5deg)' },
                    '50%': { transform: 'rotate(0.5deg)' },
                    '55%': { transform: 'rotate(-0.25deg)' },
                    '60%': { transform: 'rotate(0deg)' },
                    '100%': { transform: 'rotate(0deg)' }
                },
            },

            animation: {
                wiggle: 'wiggle 0.5s ease-in-out infinite',
                fadeInUp: 'fadeInUp 0.5s ease-out',
                pulseScale: 'pulseScale 2s ease-in-out infinite',
                shake: 'shake 4s ease-in-out infinite',
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
