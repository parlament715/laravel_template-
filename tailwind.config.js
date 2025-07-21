module.exports = {
    darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js" // Добавьте Flowbite
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin') // Активируйте плагин
  ],
}
