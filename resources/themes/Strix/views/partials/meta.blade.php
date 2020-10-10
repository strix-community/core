    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="frontend">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="og:type" property="og:type" content="website">

    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description" content="{{ config('app.name') }}, a community built for you, by you.">
        <meta name="keywords" content="gmod, garry's mod, gaming, garry's mod server, gmod server,">
        <meta name="og:title" content="{{ config('app.name') }} - Website">
        <meta name="og:site_name" content="{{ config('app.name') }}">
        <meta name="og:description" content="{{ config('app.name') }}, a community built for you, by you.">
        <meta name="og:image" content="/icon.png">
    @endif
