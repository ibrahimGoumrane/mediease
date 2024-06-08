/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./main/build/**/*.html", "./main/build/view/*.php", "./node_modules/flowbite/**/*.js", "./main/build/**/*.js", "./main/build/view/components/*.php"],
    darkMode: 'class',
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
            fontFamily: {
                'body': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ],
                'sans': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ]
            },
            keyframes: {
                'bounce-items': {
                    '0%': { transform: 'translateY(0%)' },
                    '80%': { transform: 'translateY(-25%)' },
                    '100%': { transform: 'translateY(0%)' },
                },
                'popup-animation': {
                    '0%': { opacity: '1' },
                    '100%': { opacity: '0' },
                }
            },
            animation: {
                'bounce-items': 'bounce-items 0.5s ease-in-out forwards infinite',
                'popup-animation': 'popup-animation 1s ease-in-out forwards 0.5',
            },
            gridTemplateColumns: {
                'profile': '60% 30%',
            },
            gridTemplateRows: {
                'profile': '60% 20%',
            },
        }
    },
    plugins: [
        require('flowbite/plugin')
    ],
}