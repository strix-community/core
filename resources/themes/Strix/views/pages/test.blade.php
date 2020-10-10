@extends('layouts.default')

@section('body')
    <x-spacer
    class="spacer"
    x="calc(10rem)"
    />

    <form method="POST" action="/test">
        @csrf

        <x-editor/>

        <button type="submit">submit</button>
    </form>
@endsection
