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
    .js("resources/themes/Strix/scripts/app.js", "public/themes/Strix/scripts/app.js")
    .postCss("resources/themes/Strix/styles/app.css", "public/themes/Strix/styles/app.css", [
        tailwindcss('resources/themes/Strix/config/tailwind.config.js')
    ]);

if (mix.inProduction()) {
    mix.version();
}
