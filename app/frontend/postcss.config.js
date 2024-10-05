module.exports = {
    syntax: 'postcss-scss',

    plugins: [
        require('autoprefixer'),
        require('postcss-import'),
        require('postcss-mixins'),
        require('postcss-preset-env')({ stage: 1 }),
        require('cssnano'),
    ],
}
