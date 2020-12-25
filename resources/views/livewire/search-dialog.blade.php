<section id="search" class="alt" x-data="{ isOpen:true }" @click.away="isOpen = false">
    <form>
        <input wire:model.debounce.500ms="query" type="text" name="query" id="query" placeholder="Search (Press / to focus)" @focus="isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen=false" @keydown="isOpen=true" x-ref="query" @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.query.focus();
            }
        " />

        <div wire:loading class="spinner top-0 left-28 ml-4 mt-5"></div>
    </form>

    @if (strlen($query) >= 2)
    <div class="searchresults" style="background: white !important; z-index: 9999; position: absolute; width: 100%; margin-top: -20px; box-shadow: 0 3px 5px rgba(0,0,0,0.2); height: 540px; overflow-y: scroll" x-show.transition.opacity="isOpen">
        @if ($searchResults->count() > 0)
            <ul style="list-style: none; width: 100%;margin: 0; padding: 0">
                @foreach ($searchResults as $result)
                    <li style="padding-left: 15px;padding-bottom: 5px; padding-top: 10px;">
                        <a style=" display: inline-flex; border-bottom: 0" href="{{ route('show', $result['id'])}}" 
                            @if ($loop->last) @keydown.tab="isOpen = false" @endif
                        >
                            @if ($result['poster_path'])
                                <img src="{{ 'https://image.tmdb.org/t/p/w92/'. $result['poster_path'] }}" alt="{{ $result['title'] }}" style="width: 45px; height: auto" />
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="{{ $result['title'] }}" style="width: 45px; height: auto" />
                            @endif
                        <div style="padding-left: 10px">
                            <h4>{{ $result['title'] }}</h4>
                            <strong>Rating: </strong>{{ $result['vote_average'] * 10 . '%' }}
                        </div>
                        </a>
                    </li> 
                    @if (!$loop->last)
                        <hr style="margin-top: 10px; margin-bottom: 10px; border-bottom: solid 1px rgb(238 243 245 / 75%);">
                    @endif
                @endforeach
            </ul>
        @else
            <p style="text-align: center; padding: 20px">No result found for '<strong>{{ $query}}</strong>'</p>
        @endif
    </div>
    @endif
</section>