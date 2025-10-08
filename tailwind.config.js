/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
  ],
  theme: {
    extend: {
      colors: {
        customgreen: 'oklch(37.95% 0.062 199.58)',
        lightyel: 'oklch(93.03% 0.015 94.21)',
        darkyel: 'oklch(0.9692 0 0)',
      },
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
      },
    },
  },
  plugins: [
    require('@midudev/tailwind-animations'),
  ],
}
