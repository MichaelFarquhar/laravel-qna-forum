<div class="flex items-center space-x-8 text-slate-500 hover:text-slate-600">
    @if (isset($comments))
        {{-- Comments button --}}
        <div @click="commentsOpen = !commentsOpen" class="flex items-center {{$comments->count() == 0 ? 'hover:text-slate-500' : 'cursor-pointer'}}">
            
            {{-- icon and text --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            <span>{{$comments->count() == 1 ? '1 comment' : $comments->count().' comments' }}</span>
            
            {{-- chevron icon --}}
            @if ($comments->count() > 0)
                {{-- Up chevron and down chevron. Changes depending on if comments are open or not --}}
                <svg x-show="!commentsOpen" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                <svg x-show="commentsOpen" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                </svg>
            @endif

        </div>
    @endif

    {{-- Reply button - show only if authed --}}
    @auth
        <div @click="answerInputOpen = !answerInputOpen" class="flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
            </svg>
            <span>Reply</span>
        </div> 
    @endauth
</div>