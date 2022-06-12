<div class="border p-5 rounded-xl shadow-md">
    <div class="w-full flex items-center pb-3 border-b">
        {{-- User profile and name --}}
        <a href="{{URL::to($question->url())}}" class="flex items-center space-x-3 group">
            {{-- Checkmark for if question has a solved answer --}}
            @if(is_null($question->solution))
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif
            <div class="text-xl font-bold group-hover:text-neutral-600 transition">{{ $question->title }}</div>
        </a>
    </div>

    <div class="w-full flex items-center justify-between mb-3">
        <x-question.user :question="$question" />
        <x-question.topic-pill :question="$question" /> 
    </div>

    <div>
        {{-- Answers count --}}
        <a href="{{URL::to($question->url())}}" class="flex items-center text-slate-500 hover:text-slate-400 transition cursor-pointer w-fit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span>{{$question->answers->count()}} answers</span>
        </a>
        <div class="text-xs text-gray-400 mt-1.5">Last answered: 24 minutes ago</div>
    </div>
</div>