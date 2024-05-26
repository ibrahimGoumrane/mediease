/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./main/build/**/*.html","./main/build/**/*.php","./ node_modules/flowbite/**/*.js", "./main/build/**/*.js"],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
            //   primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
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
        },
        animation: {
            'bounce-items': 'bounce-items 0.5s ease-in-out forwards infinite',
        
    },
  },},
    plugins: [
        require('flowbite/plugin')
],
}