import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
              'neon-300': '#ff14bc',
              'neon-400': '#146aff',
              'neon-500': '#146aff',
              'neon-700': '#ff14bc',
            },
            boxShadow: {
              'neon': '0 0 10px  #ff14bc, 0 0 20px #146aff, 0 0 40px #b509b5f',
            },
            variants: {},
    plugins: [],
        },
    },
    plugins: [],
};

