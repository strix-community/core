<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('partials.meta')

    @hasSection('title')
        <title>{{ config('app.name') }} | @yield('title')</title>
    @else
        <title>{{ config('app.name') }}</title>
@endif

@include('partials.styles')

@include('partials.scripts')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div>
    <div class="navbar">
        <div class="navbar__container">
            <ul class="navbar__group">
                <li class="navbar__item">
                    <a
                        href="/"
                        class="navbar__link"
                    >
                        Home
                    </a>
                </li>

                <li class="navbar__item">
                    <a
                        href="/"
                        class="navbar__link"
                    >
                        Forums
                    </a>
                </li>

                <li class="navbar__item">
                    <a
                        href="/"
                        class="navbar__link"
                    >
                        Rules
                    </a>
                </li>
            </ul>

            <ul class="navbar__group navbar__group--float-right">
                <li class="navbar__item">
                    <a
                        href="/"
                        class="navbar__link"
                    >
                        <img
                            class="avatar avatar--md"
                            src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3e1035962b11b8a5d1041105cba15d36e79b7e5b_full.jpg"
                        >
                    </a>
                </li>
            </ul>
        </div>
    </div>



    <div class="min-h-screen">
        @yield('body')
    </div>

    {{-- <x-footer /> --}}

    <script>
    </script>
</div>


@stack('scripts')

</body>
</html>
