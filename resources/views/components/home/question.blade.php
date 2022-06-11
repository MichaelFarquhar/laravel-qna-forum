<div class="border p-5 rounded-xl shadow-md">
    <div class="w-full flex items-center justify-between pb-3 border-b">
        {{-- User profile and name --}}
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-slate-400 rounded-full"></div>
            <div class="text-lg font-bold text-slate-700">{{ $question->user->name }}</div>
        </div>

        {{-- Question topic and "x time ago" --}}
        <div class="flex items-center space-x-8">
            <button class="text-xs border rounded-2xl px-3 py-1 bg-neutral-100 font-semibold">{{ $question->topic->name }}</button>
            <div class="text-xs text-neutral-500">{{ $question->created_at->diffForHumans() }}</div>
        </div>
    </div>

    {{-- Question and description --}}
    <div class="mt-4 mb-6">
        <div class="text-xl mb-3 font-bold">{{ $question->title }}</div>
        <div class="text-sm text-neutral-600">{{ $question->content }}</div>
    </div>

    <div>
        <div class="flex justify-between items-center text-slate-500">
            {{-- Comment count --}}
            <div class="flex items-center hover:text-slate-600 transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <span>125 comments</span>
            </div>
            {{-- Share button--}}
            <div class="flex items-center space-x-4">
                <button class="border rounded-lg py-1 px-3 text-sm">Share</button>
            </div>
        </div>
    </div>
</div>