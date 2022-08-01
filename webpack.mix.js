let glob = require('glob');

// Run all webpack.mix.js in app
glob.sync('./packages/**/webpack.mix.js').forEach(item => require(item));
