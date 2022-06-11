<div class="border p-5 rounded-xl shadow-md">
    <div class="w-full flex items-center pb-3 border-b">
        {{-- User profile and name --}}
        <div class="flex items-center space-x-3">
            {{-- Checkmark for if question has a solved answer --}}
            @if(is_null($question->best_answer))
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif
            <div class="text-xl font-bold">{{ $question->title }}</div>
        </div>
    </div>

    <div class="w-full flex items-center justify-between mb-3">
        <div class="flex items-center space-x-3 py-3">
            <div class="w-8 h-8 bg-slate-400 rounded-full bg-[url('https://i.pravatar.cc/32')]"></div>
            <div>
                <div class="text-md font-semibold text-slate-700">{{ $question->user->name }}</div>
                <div class="text-xs text-neutral-500">asked {{ $question->created_at->diffForHumans() }}</div>
            </div>
        </div>
        <button class="text-xs border rounded-2xl px-3 py-1 bg-neutral-100 font-semibold">{{ $question->topic->name }}</button>
    </div>

    <div>
        <div class="">
            {{-- Comment count --}}
            <div class="flex items-center text-slate-500 hover:text-slate-600 transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <span>125 comments</span>
            </div>
            <div class="text-xs text-gray-400 mt-1.5">Last comment: 24 minutes ago</div>
        </div>
    </div>
</div>