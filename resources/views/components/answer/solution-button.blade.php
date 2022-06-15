@auth
    {{-- Show only if this question was created by the authed user --}}
    @if (auth()->user()->id === $question->user->id)
        
        {{-- Show button if there is no solution already --}}
        @if (is_null($question->solution))
            <form action="{{route('answers.solution')}}" method="POST">
                @csrf
                @method("PATCH")

                <input type="hidden" name="question_id" value="{{$question->id}}">
                <input type="hidden" name="answer_id" value="{{$answer->id}}">
                <button type="submit" class="text-sm py-1 px-3 border rounded-lg text-slate-600 bg-neutral-100 hover:bg-neutral-200 transition">
                    Mark As Solution
                </button>
            </form>
        @endif

    @endif

@endauth

