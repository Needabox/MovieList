<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        class="bg-indigo-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline text-white" 
        placeholder="Search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >
    
    <div class="absolute top-0">
        <svg class="fill-current text-indigo-500 w-4 mt-2 ml-1" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M193.5 38.1c-26.5 3.6-54.9 13.6-77.8 27.4-51.7 31-85 80.9-95.3 143-2.3 13.5-2.3 44.2-.1 58.4 8.2 51.4 35 98 74 128.5 66.9 52.2 158.9 57.8 229.8 14 4.8-3 9.1-5.4 9.5-5.4.4 0 24 23.1 52.3 51.4 58.7 58.6 55.4 56 71.1 56 11.7 0 16.6-2 24.9-9.9 8.2-7.8 11.5-15.3 11.5-26-.1-5.9-.6-9.6-2.4-14-2.1-5.7-5.3-9-54-58l-51.7-52 4.8-7.5c10.2-15.6 19.2-36.6 24.4-56.7 7.7-29.6 7.7-67.8 0-98.1-9.6-38.1-31.2-74.7-58.7-99.6-27.1-24.6-60.3-41.4-97.1-49.2-10.7-2.3-15.1-2.6-35.2-2.9-12.6-.2-26.1.1-30 .6zm57 75.3c24.4 6.1 44.9 18.4 62.9 37.7 23 24.8 33.6 52.1 33.6 87 0 34.8-10.9 62-35 87.3-14.9 15.5-28.8 25.1-46.8 32.1-29.6 11.4-67.2 10.7-96.3-1.9-28.7-12.5-54.9-38.5-67.1-66.9-12.2-28.3-13.6-62.3-3.6-92.7 10.5-32.5 40.3-63.8 73.2-77.2 16.7-6.8 28.9-8.8 51.6-8.3 14.6.3 19.2.7 27.5 2.9z"/></svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if (strlen($search) >= 2)
        <div 
            class="z-50 absolute bg-indigo-800 text-sm rounded w-64 mt-4" 
            x-show.transition.opacity="isOpen"
        >
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach($searchResults as $sr)
                        <li class="border-b border-indigo-700">
                            <a 
                                href="{{ route('movie.show', [$sr['id']]) }}" 
                                class="block hover:bg-indigo-700 px-3 py-3 flex items-center"
                                @if($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                                @if ($sr['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $sr['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $sr['title'] }}</span>
                            </a>
                        </li>            
                    @endforeach
                </ul>
                <ul>
                    @foreach($searchResults2 as $sr2)
                        <li class="border-b border-indigo-700">
                            <a 
                                href="{{ route('tv.show', [$sr2['id']]) }}" 
                                class="block hover:bg-indigo-700 px-3 py-3 flex items-center"
                                @if($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                                @if ($sr2['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $sr2['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $sr2['name'] }}</span>
                            </a>
                        </li>            
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No Results For "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>