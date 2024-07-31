module.exports = {
  content: [
    './**/*.php',
    './src/**/*.js',
    './src/**/*.css',
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: '2rem', // Ajoute un padding par défaut à tous les conteneurs
        margin: {
          DEFAULT: '1rem', // Définit une marge par défaut
          sm: '2rem', // Pour les écrans petits
          lg: '4rem', // Pour les écrans grands
          xl: '5rem', // Pour les écrans très grands
        },
      },
    },
  },
  plugins: [],
};
