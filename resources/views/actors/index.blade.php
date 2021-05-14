@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 py-16">

        {{-- Start Of Popular Actors --}}
            <div class="popular-movies">
                <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Actors</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($popularActors as $actor)
                        <div class="actor mt-8">
                            <a href="{{ route('actor.show', $actor['id']) }}">
                                <img src="{{ $actor['profile_path'] }}" alt="Image Actors">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('actor.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                                <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        {{-- End Of Popular Actors --}}
        
        {{-- Start Of Infinite Scroll --}}
        <div class="page-load-status">
            <div class="flex justify-center">
                <p class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</p>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">Error To Load Page</p>
            </div>
        </div>
        {{-- End Of Infinite Scroll --}}

        {{-- Start Of Pagination --}}
            {{-- <div class="flex justify-between mt-16">
                @if ($previous)
                    <a href="/actors/page/{{ $previous }}">Previous</a>
                @else
                    <div></div>
                @endif

                @if ($next)
                    <a href="/actors/page/{{ $next }}">Next</a>
                @else
                    <div></div>
                @endif
            </div> --}}
        {{-- End Of Pagination --}}
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
        // options
        path: '/actors/page/@{{#}}',
        append: '.actor',
        status: '.page-load-status',
        //history: false,
        });
    </script>
@endsection