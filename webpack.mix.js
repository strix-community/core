const mix = require("laravel-mix");
const tailwindcss = require('tailwindcss');

mix.options({
    hmrOptions: {
        host: 'localhost',
        port: '8079'
    },
});

mix.webpackConfig({
    devServer: {
        port: '8079'
    },
});

mix
    .setPublicPath(path.normalize('public/themes/Strix'))
    .js("resources/themes/Strix/scripts/app.js", "scripts/app.js")
    .postCss("resources/themes/Strix/styles/app.css", "styles/app.css", [
        tailwindcss('resources/themes/Strix/config/tailwind.config.js')
    ])
    .version();
