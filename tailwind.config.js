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
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#10b981',
                'primary-dark': '#059669',
                'app-bg': '#121212',
                'card-bg': '#1a1a1a',
                'text-main': '#ffffff',
                'text-label': '#94a3b8',
                border: '#262626',
            },
        },
    },

    plugins: [forms],
};
