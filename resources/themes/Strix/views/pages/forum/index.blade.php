@extends('layouts.default')

@section('body')
    <div>
        <x-spacer class="spacer" x="10rem" />

        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-8 gap-4">
                <div class="col-span-1 md:col-span-6">
                    <div class="card">
                        <div class="card__header">
                            <div class="card__title">
                                Official
                            </div>
                        </div>

                        <div class="board grid grid-cols-12 gap-0">
                            <div class="board__section hidden md:block md:col-span-1">
                                <a
                                    href="#"
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
                                        href="#"
                                        class="board__title"
                                    >
                                        Announcements
                                    </a>

                                    <div class="board__minor space-x-2">
                                        <div>
                                            Threads:
                                            <a
                                                href="#"
                                                class="text-neutral-050"
                                            >
                                                1
                                            </a>
                                        </div>

                                        <div>
                                            Comments:
                                            <a
                                                href="#"
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
                                        class="board__thread"
                                        href="#"
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

                <div class="col-span-1 md:col-span-2">
                    <div class="card">

                        <div class="card__header">
                            <div class="card__title">
                                Latest Threads
                            </div>
                        </div>

                        <div class="relative w-full h-full">
                            <div class="latest-threads grid grid-cols-12 gap-0">
                                <div class="latest-threads__section hidden md:block md:col-span-3">
                                    <a
                                        href="#"
                                        class="latest-threads__avatar"
                                    >
                                        <img
                                            src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3e1035962b11b8a5d1041105cba15d36e79b7e5b_full.jpg"
                                            alt=""
                                            class="avatar avatar--md"
                                        >
                                    </a>
                                </div>

                                <div class="latest-threads__section col-span-12 md:col-span-9">
                                    <div class="latest-threads__block">
                                        <a
                                            href="#"
                                            class="latest-threads__title"
                                        >
                                            Some sort of title with a stupidly long title? who the fuck allowed this what the fuck
                                        </a>

                                        <div class="latest-threads__info">
                                            3 days ago by:
                                            <a
                                                href="#"
                                                class="latest-threads__link"
                                            >
                                                atlas
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
