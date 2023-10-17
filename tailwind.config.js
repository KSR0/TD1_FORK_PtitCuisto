/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/*.{html,js,php}"],
  theme: {
    extend: {
    },
    textColor: {
      'charte_bleu_fonce': '#2a3990',
      'charte_blanc': '#ffffff',
      'charte_gris': '#999999',
      'charte_bleu_clair': '#7890cd',
    },
    fontFamily: {
      'permanent_marker': ['Permanent Marker', 'cursive'],
      'pacifico': ['Pacifico', 'cursive'],
    }
  },
  plugins: [],
}