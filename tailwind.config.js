/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.html', './index.php',
  ],
  theme: {
    extend: {
		fontFamily: {
			'heading': ['"Geist Mono"', 'sans-serif'],
		}
    },
  },
  plugins: [],
}

