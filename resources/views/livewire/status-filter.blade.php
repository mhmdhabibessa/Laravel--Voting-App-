<div>
    <nav class="flex items-center justify-between text-gray-400 text-xs">
        <ul class="flex uppercase font-semibold space-x-10">
            <li> <a wire:click.prevent="setStatus('ALL')" href="{{route('ideas.index' ,['status' =>'ALL' ] )}}" class="border-b-4 pb-3
                 @if($status === 'ALL')
                border-blue text-gray-900
                @endif 
            "> All Ideas({{$statusCount['all_statuses']}}) </a></li>
            <li> <a wire:click.prevent="setStatus('Considering')" href="#" class="border-b-4 pb-3 transition duration-200 ease-in hover:border-blue
                @if($status === 'Considering')
                border-blue text-gray-900
                @endif"> Considering({{$statusCount['Considering']}}) </a></li>
            <li> <a  wire:click.prevent="setStatus('In Progress')"  href="#" class="border-b-4 pb-3 transition duration-200 ease-in hover:border-blue
                @if($status === 'In Progress')
                border-blue text-gray-900
                @endif"> In Progress({{$statusCount['In_Progress']}}) </a></li>
        </ul>

        <ul class="flex uppercase font-semibold space-x-10 ">
            <li> <a  wire:click.prevent="setStatus('Implemented')" href="#" class="border-b-4 pb-3 transition duration-200 ease-in hover:border-blue 
                @if($status === 'Implemented')
                border-blue text-gray-900
                @endif
                "> Implemented({{$statusCount['Implemented']}}) </a></li>
            <li> <a  wire:click.prevent="setStatus('Closed')" href="#" class="border-b-4 pb-3 transition duration-200 ease-in hover:border-blue
                @if($status === 'Closed')
                border-blue text-gray-900
                @endif
                "> Closed({{$statusCount['Closed']}}) </a></li>
        </ul>
        
    </nav>
</div>
