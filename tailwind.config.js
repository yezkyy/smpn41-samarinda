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
        primary: {
          DEFAULT: '#1E40AF', // Blue-800
          light: '#3B82F6',   // Blue-500
          dark: '#1E3A8A',    // Blue-900
        },
        secondary: '#FFFFFF',
        accent: {
          DEFAULT: '#FACC15', // Yellow-400
          dark: '#EAB308',    // Yellow-500
        }
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
