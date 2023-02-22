<div class="flex-1 flex items-center">
    <div class="relative">
        <input wire:model.debounce.300ms="search"
        id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white
        placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300
        focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
        placeholder="Search music" type="search" autocomplete="off">

        @if (strlen($search) > 2 )
            <ul 
                class = "absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200">
                @forelse($searchResult as $result)
                    <li>
                        <a href="{{ $result['artistViewUrl'] }}"
                            class="flex items-cencer px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                            <img src="{{ $result['artworkUrl60'] }}"
                                alt="album art" class="w-10">
                            <div class="m1-4 leading-tight">
                                <div class="font-semibold">{{ $result['artistName'] }}</div>
                                <div class="text-gray-600">{{ $result['collectionName'] }}</div>
                            </div>         
                        </a>
                    </li>
                @empty
                    <li class="px-4 py-4">No results for "{{ $search }}"</li>
                @endforelse
            </ul>
        @endif    
    </div> 
</div>
