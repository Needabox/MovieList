@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 pt-16">

        {{-- Start Of Popular Movies --}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div>

        {{-- End Of Popular Movies --}}

        {{-- Start Of Now Playing --}}
            <div class="now-playing py-24">
                <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Now Playing</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
                    {{-- @foreach ($popularMovies as $movie)
                        @if ($loop->index < 5)
                            <x-movie-card :movie="$movie" :genres="$genres" />
                        @endif
                    @endforeach --}}
                    @foreach ($nowPlayingMovies as $movie)
                        <x-movie-card :movie="$movie" />
                    @endforeach
                </div>
            </div>
        {{-- End Of Now Playing --}}
    </div>
@endsection