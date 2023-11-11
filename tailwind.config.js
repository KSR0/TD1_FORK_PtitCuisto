/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["views/*.{html,js,php}"],
  theme: {
    extend: {
      maxHeight: {
        'div_recette': '590px',
        'div_recette_mobile': '1200px',
      }
    },
    textColor: {
      'charte_bleu_fonce': '#2a3990',
      'charte_blanc': '#ffffff',
      'charte_gris': '#999999',
      'charte_bleu_clair': '#7890cd',
    },
    colors: {
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