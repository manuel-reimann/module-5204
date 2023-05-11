/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/index.html"],
  content: [
    "./node_modules/flowbite/**/*.js"
],

  theme: {
    extend: {
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/postcss7-compat'),
    require('autoprefixer')
    
  ],
  darkMode: 'class',
}


