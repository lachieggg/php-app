const path = require('path');

module.exports = {
  entry: {
    'home': './js/home.js',
    'blog': './js/blog.js',
    'forum': './js/forum.js',
    'admin': './js/admin.js',
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/js/generated'),
  },
};