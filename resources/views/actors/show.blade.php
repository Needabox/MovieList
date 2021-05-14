@extends('layouts.main')
@section('content')
{{--Start Of Actors Info --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" class="w-64 lg:w-96">
                <ul class="flex items-center mt-4">

                    {{-- Facebook --}}
                    @if ($social['facebook_id'])
                        <li class="ml-6">
                            <a href="{{ $social['facebook'] }}" title="Facebook">
                                <img src="{{ asset('img/facebook.png') }}" alt="facebook" class="fill-current text-gray-400 hover:text-white w-6">
                            </a>
                        </li>   
                    @endif

                    {{-- Instagram --}}
                    @if ($social['instagram_id'])
                        <li class="ml-6">
                            <a href="{{ $social['instagram'] }}" title="Instagram">
                                <img src="{{ asset('img/instagram.png') }}" alt="facebook" class="fill-current text-gray-400 hover:text-white w-6">
                            </a>
                        </li>   
                    @endif

                    {{-- Twitter --}}
                    @if ($social['twitter'])
                        <li class="ml-6">
                            <a href="{{ $social['twitter'] }}" title="Twitter">
                                <img src="{{ asset('img/twitter.png') }}" alt="facebook" class="fill-current text-gray-400 hover:text-white w-6">
                            </a>
                        </li>  
                    @endif

                    {{-- Website HomePage --}}
                    @if ($actor['homepage'])
                        <li class="ml-6">
                            <a href="{{ $actor['homepage'] }}" title="Website">
                                <img src="{{ asset('img/web.png') }}" alt="facebook" class="fill-current text-gray-400 hover:text-white w-6">
                            </a>
                        </li>  
                    @endif
                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">
                    {{ $actor['name'] }}
                </h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <img src="{{ asset('img/birthday.png') }}" alt="" width="20">
                    <span class="ml-2">{{ $actor['birthday'] }} ({{ $actor['age'] }} Years Old) in {{ $actor['place_of_birth'] }}</span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>

                <h4 class="font-semibold mt-12">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage'] }}">
                                <img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <a href="{{ $movie['linkToPage'] }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{ $movie['title'] }}</a>
                        </div>  
                    @endforeach
                </div>

            </div>
        </div>
    </div>
{{-- End Of Actors Info --}}

{{-- Start Of Credits --}}
    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
{{-- End of Credits --}}

@endsection