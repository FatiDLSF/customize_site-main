import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const colors = require('tailwindcss/colors')

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
            },
        },
        colors:
        {
            'amarillo-1': '#F5EDCE',
            'azul-1': '#89C4E1',
            'morado-1': '#58287F',
            'negro': '#1A0000',
            stone: colors.stone,
        }
    },

    plugins: [forms],
};
