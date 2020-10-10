@extends('layouts.default')


@section('body')
    <div>
        <x-spacer class="spacer" x="10rem" />

        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">

                <div class="col-span-1 md:col-span-8">
                    <div class="card">
                        <div class="card__header">
                           <span class="card__title">
                               Sign up
                           </span>
                        </div>

                        <x-form class="card__content" action="{{ route('register') }}">

                            <div class="form__group form__group--first">
                                <x-label class="label" for="name" />
                                <x-input class="input input--medium" name="name" />
                            </div>

                            <div class="form__group">
                                <x-label class="label" for="password" />
                                <x-input class="input input--medium" type="password" name="password" />
                            </div>

                            <div class="form__group">
                                <x-button class="button button--md button--primary ml-auto">
                                    Sign In
                                </x-button>
                            </div>

                        </x-form>

                    </div>
                </div>


                <div class="col-span-1 md:col-span-4">
                    <div class="card">
                        <div class="card__header">
                           <span class="card__title">
                               Sign In Faster
                           </span>
                        </div>

                        <div class="card__content">
                            <x-button
                                class="button button--lg w-full"
                                background-color="#7289DA"
                                text-color="#FFF"
                            >
                                Discord
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
