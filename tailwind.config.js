/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./main/build/**/*.php", "./main/build/**/*.js"],
    theme: {
        extend: {
            colors: {
                'light-green': '#1CA102',
                'light-white': '#fdfdfd',
                'light-gray': '#D3D7D6',
                'light-light-black': '#AEB3B0',
                'light-black': '#2a302e',
                'light-orange': '#ed9646',
            },
            keyframes: {
                'bounce-items': {
                    '0%': { transform: 'translateY(0%)' },
                    '80%': { transform: 'translateY(-25%)' },
                    '100%': { transform: 'translateY(0%)' },
                },
            },
            animation: {
                'bounce-items': 'bounce-items 0.5s ease-in-out forwards infinite',
            }
        }
    },
    plugins: [],
}