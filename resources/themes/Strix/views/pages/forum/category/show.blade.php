@extends('layouts.default')

@section('body')
    <x-sections.backdrop
        image="https://i.imgur.com/KyviFID.jpg"
    />

    <x-spacer
        class="spacer"
        x="10rem"
    />

    <div class="relative container mx-auto z-50">
        <div class="grid grid-cols-1 gap-8">
            <div class="col-span-1">
                <h3 class="text-neutral-100 text-3xl font-medium text-center">
                    Official
                </h3>

                <p class="text-neutral-200 text-center">
                    Something about it being official or w/e
                </p>
            </div>

            <div class="col-span-1">
                <div class="card">
                    <div class="board grid grid-cols-12 gap-0">
                        <div class="board__section hidden md:block md:col-span-1">
                            <a
                                href="/"
                                class="board__image"
                            >
                                <img
                                    src="https://media.gmodstore.com/_/assets/img/forum/icons/megaphone.svg"
                                    alt=""
                                    class="w-8 h-8"
                                >
                            </a>
                        </div>

                        <div class="board__section col-span-6">
                            <div class="board__block">
                                <a
                                    href="/"
                                    class="board__title"
                                >
                                    Announcements
                                </a>

                                <div class="board__minor space-x-2">
                                    <div>
                                        Threads:
                                        <div class="inline-block text-neutral-050">
                                            <a href="/">
                                                1
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        Comments:
                                        <a
                                            href="/"
                                            class="text-neutral-050"
                                        >
                                            1
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="board__section col-span-6 md:col-span-5">
                            <div class="board__block">
                                <a
                                    href="/"
                                    class="board__thread"
                                >
                                    Some sort of title with a stupidly long title? who the fuck allowed this what the fuck
                                </a>

                                <div class="board__minor space-x-2">
                                    <div>
                                        3 days ago
                                    </div>

                                    <div class="text-neutral-300 text-sm">·</div>

                                    <a
                                        href="#"
                                        class="text-neutral-100"
                                    >
                                        atlas
                                    </a>

                                </div>

                                <img
                                    src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3e1035962b11b8a5d1041105cba15d36e79b7e5b_full.jpg"
                                    alt=""
                                    class="board__avatar"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
