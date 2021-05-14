<div class="mt-8">
    <a href="{{ route('movie.show', $movie['id']) }}">
        <img src="{{ $movie['poster_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ route('movie.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <img src="{{ asset('img/star.png') }}" alt="" width="20">
            <span class="ml-1"> {{ $movie['vote_average'] }}</span>
            <span class="mx-2">|</span>
            <span>{{ $movie['release_date'] }}</span>
        </div>
        <div class="text-gray-400 text-sm mt-1">
            {{ $movie['genres'] }}
            {{-- @foreach ($movie['genre_ids'] as $genre)
                {{ $genres->get($genre) }} @if (!$loop->last), @endif
            @endforeach --}}
        </div>
    </div>
</div>