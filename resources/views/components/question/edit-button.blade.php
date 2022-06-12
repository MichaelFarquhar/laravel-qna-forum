{{-- If this question belongs to authed user, show edit button--}}
@auth
    @if ($question->user->id == auth()->user()->id)                    
        <a href="#" class="py-0.5 px-2 rounded bg-cyan-400 hover:bg-cyan-600 text-white flex items-center space-x-1 mr-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
            <span class="text-sm font-bold">Edit</span>
        </a>
    @endif
@endauth