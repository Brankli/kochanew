const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/app.js")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .js("resources/js/back/back.js", "public/back.js")
    .js("resources/js/login/login.js", "public/login.js")
    .js("resources/js/login/reset.js", "public/reset.js")
    .vue()
    .version();

