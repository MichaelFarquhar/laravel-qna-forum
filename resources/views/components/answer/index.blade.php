<div x-data="{answerOpen: true, commentsOpen: false, answerInputOpen: false}">
    <div class="ml-4 flex">
        {{-- If solution, show a green border instead--}}
        @if ($question->solution === $answer->id)
            <div @click="answerOpen = !answerOpen" x-bind:class="!answerOpen ? 'border-l-4 border-green-300 rounded-l pr-6 cursor-pointer' : 'border-l-4 border-green-500 rounded-l pr-6 cursor-pointer'"></div>
        @else
            <div @click="answerOpen = !answerOpen" x-bind:class="!answerOpen ? 'border-l-4 border-slate-300 rounded-l pr-6 cursor-pointer' : 'border-l-4 border-slate-500 rounded-l pr-6 cursor-pointer'"></div>
        @endif

        {{-- Text to show when answer is minimized --}}
        <div class="text-sm" x-show="!answerOpen">{{$answer->user->name}} - {{$answer->comments->count() == 1 ? '1 comment' : $answer->comments->count().' comments' }}</div>

        {{-- Regular answer -> will hide when left border is clicked --}}
        <div class="space-y-3" x-show="answerOpen">

            {{-- Text to denote marked as solution --}}
            @if ($question->solution === $answer->id)
                <div class="flex items-center space-x-2 text-green-500 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm">Marked as solution</span>
                </div>
            @endif

            <x-answer.user name="{{$answer->user->name}}" time="{{$answer->created_at->diffForHumans()}}"/>
            <x-answer.text text="{{$answer->answer}}" />

            {{-- Mark as solution button --}}
            <x-answer.solution-button :question="$question" :answer="$answer"/>

            <x-answer.buttons :comments="$answer->comments"/>
        </div>
    </div>

    {{-- Input box to add a reply --}}
    @auth
        <form x-show="answerInputOpen" class="ml-12 pt-4 pb-2" action="{{route('comments.store')}}" method="POST">
            @csrf
            
            <input type="hidden" name="answer_id" value="{{$answer->id}}">
            <x-form.input name="comment" type="textarea" label="Write a reply" rows="2" required="required"/>

            <button type="submit" class="mt-3 rounded-md py-1 px-4 bg-neutral-600 text-white font-medium text">Reply</button>
        </form>
    @endauth

    <div x-show="answerOpen && commentsOpen" class="{{$answer->comments->count() > 0 ? 'pt-4 space-y-4' : ''}}">
        @foreach ($answer->comments as $comment)
            <div class="border-l-4 border-slate-400 pl-4 ml-12 rounded space-y-2">
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-neutral-600 font-semibold">{{$comment->user->name}}</div>
                    <div class="text-xs text-neutral-500 leading-4">{{$comment->created_at->diffForHumans()}}</div>
                </div>
                <div class="text-sm">{{$comment->comment}}</div>
            </div>
        @endforeach
    </div>
</div>