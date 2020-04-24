@extends('layouts.app')

@php
$localePreferenceKey = 'locale';
$resourceLanguagePreferenceKey = 'resource-language';
@endphp

@section('content')
<div class="w-full bg-white">
    <div class="px-6 py-12 mb-6 text-center bg-gray-100 border-b">
        <h1 class="pb-4 text-xl  md:text-4xl">{{ __('My preferences') }}</h1>
    </div>

    <div class="container items-start max-w-4xl px-6 py-8 mx-auto md:flex md:px-0">
        <div class="w-full mb-6 md:pr-12">
            <h2 class="mt-8 mb-6 text-xl text-black md:text-2xl">
                {{ __('Account Preferences') }}
            </h2>

            <form method="post" action="{{ route_wlocale('user.preferences.update') }}">
                @method('PATCH')
                @csrf
                <div class="mb-6">
                    <label for="{{ $localePreferenceKey }}" id="locale-label">
                        {{ __('Which resources should we show for you?') }}
                    </label>

                    <div>
                    @foreach ($resourceLanguagePreferences as $index => $label)
                        <input
                            id="lang_pref_{{ $index }}"
                            name="{{ $resourceLanguagePreferenceKey }}"
                            type="radio"
                            value="{{ $index }}"
                            {{ $currentResourceLanguagePreference == $index ? 'checked' : '' }}
                        />
                        <label for="lang_pref_{{ $index }}">{{ $label }}</label>
                        <br />
                    @endforeach
                    </div>
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="{{ $localePreferenceKey }}" id="locale-label">
                        {{ __('Preferred Language') }}
                    </label>

                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('name') ? ' border-red-500' : '' }}"
                        name="{{ $localePreferenceKey }}"
                        aria-labelledby="locale-label">

                        @foreach (Facades\App\Localization\Locale::slugs() as $slug)
                            <option value="{{ $slug }}"
                                @if (old($localePreferenceKey) == $slug || $preferredLocale == $slug) selected @endif
                                >{{ Facades\App\Localization\Locale::languageForLocale($slug) }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has($localePreferenceKey))
                        <p class="mt-2 text-xs italic text-red-500">
                            {{ $errors->first($localePreferenceKey) }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label id="os-label" for="operating-system">
                        {{ __('Preferred Operating System') }}
                    </label>

                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('operating-system') ? ' border-red-500' : '' }}"
                        name="operating-system"
                        aria-labelledby="os-label">
                        @foreach (App\OperatingSystem::ALL as $key)
                            <option value="{{ $key }}" {{ (Preferences::get('operating-system') == $key || old('operating-system') == $key) ? 'selected' : '' }}>@lang('operatingsystems.' . $key)</option>
                        @endforeach
                    </select>

                    @if ($errors->has('operating-system'))
                        <p class="mt-2 text-xs italic text-red-500">
                            {{ $errors->first('operating-system') }}
                        </p>
                    @endif
                </div>

                <div class="flex flex-wrap mb-6">
                    <label id="track-label" for="track">
                        {{ __('Current Track') }}
                    </label>

                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('track') ? ' border-red-500' : '' }}"
                        name="track"
                        aria-labelledby="track-label">
                        @foreach (App\Track::all() as $track)
                            <option value="{{ $track->id }}" {{ (auth()->user()->track_id == $track->id || old('track') == $track->id) ? 'selected' : '' }}>{{ $track->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('track'))
                        <p class="mt-2 text-xs italic text-red-500">
                            {{ $errors->first('track') }}
                        </p>
                    @endif
                </div>

                <button class="inline-block px-4 py-2 text-base font-bold leading-normal text-center text-gray-100 no-underline whitespace-no-wrap align-middle bg-blue-500 border rounded select-none hover:bg-blue-700">{{ ucfirst(__('save')) }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
