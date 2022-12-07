/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php"],
  theme: {
    extend: {
      fontFamily: {
        "Poppins": ['Poppins', 'sans-serif'],
        "Outfit": ['Outfit', 'sans-serif'],
        "Inter": ['Inter', 'sans-serif'],
        "Barlow": ['Barlow', 'sans-serif'],
        "Roboto": ['Roboto', 'sans-serif'],
        "Oswald": ['Oswald', 'sans-serif'],
        "OpenSans": ['Open Sans', 'sans-serif']
      }
    },
  },
  plugins: [],
}
