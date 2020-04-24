@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="px-6 py-12 mb-6 text-center bg-gray-100 border-b">
        <h1 class="pb-4 text-xl md:text-4xl">{{ __('Under Construction') }}</h1>
    </div>

    <div class="container items-start max-w-4xl px-12 py-8 mx-auto md:flex md:px-0">
        <div class="w-full mb-12 md:pr-12">
            <h2 class="mt-8 mb-6 text-xl text-black md:text-2xl">
                <p class="mb-4">This site is currently being built. You may notice it changing as you use it, or feeling incomplete&mdash;don't worry!</p>
                <p>You can <a class="text-blue-700 hover:underline" href="https://github.com/tightenco/onramp">view its source</a>, <a class="text-blue-700 hover:underline" href="https://discord.gg/NQQcjCZ">join a chat of people talking about how best to build it</a>, watch <a class="text-blue-700 hover:underline" href="https://www.youtube.com/playlist?list=PLgJIx0-UaB9TtEjorHmkp71C_becHkpJO">old live streams</a> or <a class="text-blue-700 hover:underline" href="https://mattstauffer.com/stream">follow along with new live streams</a> of it being built, or <a class="text-blue-700 hover:underline" href="https://github.com/tightenco/onramp/blob/master/contributing.md">contribute to it yourself</a>.
            </h2>
        </div>
    </div>
</div>
@endsection
