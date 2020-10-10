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
                    Announcements
                </h3>

                <p class="text-neutral-200 text-center">
                    announcement do be epic
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
                                    src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3e/3e1035962b11b8a5d1041105cba15d36e79b7e5b_full.jpg"
                                    alt=""
                                    class="avatar avatar--md"
                                >
                            </a>
                        </div>

                        <div class="board__section col-span-6">
                            <div class="board__block">
                                <a
                                    href="/"
                                    class="board__title"
                                >
                                    Some sort of title with a stupidly long title? who the fuck allowed this what the fuck
                                </a>

                                <div class="board__minor">
                                    <a
                                        href="/"
                                        class="text-neutral-050"
                                    >
                                        atlas
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="board__section col-span-6 md:col-span-2">
                            <div class="board__block">
                                <div class="space-x-2">
                                    <x-heroicon-s-chat-alt-2
                                        class="icon text-neutral-200 icon--md"
                                    />

                                    <a
                                        href="/"
                                        class="thread__link"
                                    >
                                        1
                                    </a>
                                </div>

                                <div class="space-x-2">
                                    <x-heroicon-s-clock
                                        class="icon text-neutral-200 icon--md"
                                    />

                                    <a
                                        href="/"
                                        class="thread__link"
                                    >
                                        3 days ago
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="board__section hidden md:block md:col-span-3">
                            <div class="board__block items-end">
                                <div class="thread__link">
                                    <a
                                        href="/"
                                        class="thread__link"
                                    >
                                        atlas
                                    </a>
                                </div>

                                <div class="relative z-10 space-x-2">
                                    <x-heroicon-s-clock
                                        class="icon text-neutral-200 icon--md"
                                    />

                                    <div class="thread__link">
                                        3 seconds ago
                                    </div>
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
