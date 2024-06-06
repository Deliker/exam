const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/index.js', 'public/js')
   .js('resources/js/chat.js', 'public/js')
   .js('resources/js/login.js', 'public/js')
   .js('resources/js/main.js', 'public/js')
   .js('resources/js/mystic-adventure.js', 'public/js')
   .js('resources/js/register.js', 'public/js')
   .js('resources/js/slots.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .postCss('resources/css/styles.css', 'public/css', [
       require('tailwindcss'),
   ]);