@if(app()->isLocal())
    <!-- Development -->

    <!-- tippy.js dev -->
    <script defer src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script defer src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <!-- alpinejs dev -->
    <script defer src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
@else
    <!-- Production -->

    <!-- tippy.js prod -->
    <script defer src="https://unpkg.com/@popperjs/core@2"></script>
    <script defer src="https://unpkg.com/tippy.js@6/dist/tippy.umd.min.js"></script>

    <!-- alpinejs prod -->
    <script defer src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.4.1/dist/alpine.min.js"></script>
@endif

    <script defer src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

    <!-- end Scripts -->

    @livewireScripts

        <!-- Scripts -->
    <script defer src="{{ mix('scripts/app.js', 'themes/Strix') }}" defer data-turbolinks-track="true"></script>
