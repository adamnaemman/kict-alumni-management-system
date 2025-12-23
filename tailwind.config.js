/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                iium: {
                    green: '#006633',
                    gold: '#CC9900',
                },
            },
        },
    },
    plugins: [],
}
