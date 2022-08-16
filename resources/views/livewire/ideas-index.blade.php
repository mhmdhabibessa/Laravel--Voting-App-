<div>
    <div class="filters flex space-x-6">
        <div class="w-1/3 m-4">
            <select name="category" wire:model="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="ALL Categories">All Categories</option>
                @foreach ($categories as $category )
                    <option value="{{$category->name}}">{{$category->name}}</option>    
                @endforeach
            </select>
        </div>
        <div class="w-1/3 m-4">
            <select name="other_filters"  wire:model="filter" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Idea">My Idea</option>
            </select>
        </div>
        <div class="w-2/3 relative m-4">
            <input wire:model="search" type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->

    <div class="ideas-container space-y-6 my-6">
        @forelse ($ideas as  $idea )
            <livewire:idea-index
            :idea="$idea"
            :key="$idea->id"
            :votesCount="$idea->votes_count"
            />
        @empty
            <div class=" mx-auto w-70 mt-10">
                <img src="{{ asset('img/no-ideas.svg')}}" alt="">
                <span class="text-red text-center ml-6 mt-1 font-bold">
                    Ops ! , No Idea Found
                </span>
                </div>
            
        @endforelse


      
    </div> <!-- end ideas-container -->

    <div class="bg-red-500"></div>
    <div class="my-8">
        {{-- {{ $ideas -> links() }} --}}
        {{ $ideas -> appends(request()->query())->links() }}   
    </div>
</div>
