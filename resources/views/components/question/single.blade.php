<div class="border p-5 rounded-xl shadow-md">
    <div class="w-full flex items-center pb-3 border-b">
        {{-- User profile and name --}}
        <a href="{{URL::to($question->url())}}" class="flex items-center space-x-3 group">
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
            <div class="text-xl font-bold group-hover:text-neutral-600 transition">{{ $question->title }}</div>
        </a>
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

    {{-- Question description --}}
    <p>{{$question->content}}</p>
</div>

<div class="px-5 mt-8">
    <x-answer.input />

    <div class="text-gray-600 text-lg font-bold my-4">Answers (3)</div>

    {{-- Answers --}}
    <div class="space-y-8">
        {{-- Answer container --}}
        <div class="border-l-4 border-slate-400 pl-6 rounded space-y-3">
            {{-- Answer user header --}}
            <x-answer.user name="Michael John" time="24 minutes ago"/>

            {{-- Answer text --}}
            <x-answer.text text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis aspernatur accusantium enim facilis repellat dicta voluptate ut illo similique perspiciatis! Sunt deserunt consequatur soluta ipsam quod sit corporis nemo minus." />

            {{-- Answer buttons --}}
            <x-answer.buttons />
        </div>
    </div>

</div>