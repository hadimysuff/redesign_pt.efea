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
            colors: {
                brand: {
                    50: '#f0f6ff',
                    100: '#e0ecff',
                    200: '#bdd6ff',
                    300: '#8fbaff',
                    400: '#5495fc',
                    500: '#176ffd',
                    600: '#0055da',
                    700: '#0048bd',
                    800: '#053e99',
                    900: '#0a377f',
                    950: '#052457',
                },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['"Plus Jakarta Sans"', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
                padding: '1rem',
            },
            keyframes: {
                'fade-up': {
                    '0%': { opacity: '0', transform: 'translateY(16px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-16px)' },
                },
                'float-slow': {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-24px)' },
                },
                'pulse-slow': {
                    '0%, 100%': { opacity: '0.25', transform: 'scale(1)' },
                    '50%': { opacity: '0.5', transform: 'scale(1.15)' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.6s ease-out both',
                float: 'float 6s ease-in-out infinite',
                'float-slow': 'float-slow 9s ease-in-out infinite',
                'pulse-slow': 'pulse-slow 10s ease-in-out infinite',
            },
        },
    },

    plugins: [forms],
};
