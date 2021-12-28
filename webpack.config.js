const path = require('path');
const Dotenv = require('dotenv-webpack');

module.exports = { 
  mode: 'development',
  entry: {
    'home': './js/home.js',
    'blog': './js/blog.js',
    'forum': './js/forum.js',
    'admin': './js/admin.js',
    'gallery': './js/gallery.js'
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/js/generated'),
  },
  plugins: [
    new Dotenv()
  ]
};