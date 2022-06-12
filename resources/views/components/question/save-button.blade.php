{{-- No user logged in -> Disable the button --}}
@guest
    <div class="py-0.5 px-2 rounded bg-stone-400 text-stone-200 flex items-center space-x-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
        </svg>
        <span class="text-sm font-bold">Save</span>
    </div>
@endguest

@auth
    {{-- If already saved, change the button and disable it from being clicked again --}}
    @if (auth()->user()->hasQuestionBookmarked($question->id))
        <div class="py-0.5 px-2 rounded bg-stone-400 text-white flex items-center space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-bold">Saved</span>
        </div>
    @else
        <form method="POST" action="{{ route('bookmarks.store') }}">
            @csrf
        
            <input type="hidden" name="question_id" value={{$question->id}}>
            <a class="py-0.5 px-2 rounded bg-stone-400 hover:bg-stone-600 hover:cursor-pointer text-white flex items-center space-x-1"
                onclick="event.preventDefault();
                this.closest('form').submit();"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
                <span class="text-sm font-bold">Save</span>
            </a>
        </form>
    @endif
@endauth