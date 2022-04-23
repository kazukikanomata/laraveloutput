module.exports = {
  purge:[
    './resources/views/tasks/create.blade.php',
    './resources/views/tasks/edit.blade.php',
    './resources/views/tasks/index.blade.php',
    './resources/views/tasks/select.blade.php',
    './resources/views/tasks/show.blade.php',
    './resources/views/tasks/top.blade.php',
  ],
  content: [],
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],
}
