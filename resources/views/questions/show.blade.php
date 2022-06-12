@extends('layouts.app')

@section('main')
    <div class="border p-5 rounded-xl shadow-md">
        <div class="w-full flex items-center pb-3 border-b">
            {{-- User profile and name --}}
            <div class="flex items-center space-x-3 group">
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
            </div>
        </div>

        <div class="w-full flex items-center justify-between mb-3">
            <x-question.user :question="$question" />
            <x-question.topic-pill :question="$question" /> 
        </div>

        {{-- Question description --}}
        <p>{{$question->content}}</p>
    </div>

    <div class="px-5 mt-8">
        @auth
            @php
                $user_answer = $question->answers->where('user_id', auth()->user()->id)
            @endphp

            {{-- Answer input box for user with show if they haven't yet wrote an answer  --}}
            @if ($user_answer->isEmpty())
                <x-answer.input :question="$question" />
            {{-- Otherwise, show that users answer at the top --}}
            @else
                <div class="text-cyan-600 text-lg font-bold my-4">Your Answer</div>
                <div class="border-l-4 border-cyan-600 pl-6 ml-4 rounded space-y-3">
                    <x-answer.user name="{{$user_answer->first()->user->name}}" time="{{$user_answer->first()->created_at->diffForHumans()}}"/>
                    <x-answer.text text="{{$user_answer->first()->answer}}" />
                    <x-answer.buttons />
                </div>
            @endif 
        @endauth

        {{-- Answers list excluding the authed user's answer (that is shown above) --}}
        @auth
            {{-- Dont show any answers title if your answer is the only one --}}
            @unless ($question->answers->where('user_id', '!=', auth()->user()->id)->count() <= 0)
                <div class="text-gray-600 text-lg font-bold mt-10 mb-4">Answers ({{$question->answers->where('user_id', '!=', auth()->user()->id)->count()}})</div>
            @endunless
            <div class="space-y-8">
                @foreach ($question->answers->where('user_id', '!=', auth()->user()->id) as $answer)
                    <div class="border-l-4 border-slate-400 pl-6 ml-4 rounded space-y-3">
                        <x-answer.user name="{{$answer->user->name}}" time="{{$answer->created_at->diffForHumans()}}"/>
                        <x-answer.text text="{{$answer->answer}}" />
                        <x-answer.buttons />
                    </div>
                @endforeach
            </div>
        @endauth
        @guest
            <div class="text-gray-600 text-lg font-bold mt-10 mb-4">Answers ({{$question->answers->count()}})</div>
            <div class="space-y-8">
                @foreach ($question->answers as $answer)
                    <div class="border-l-4 border-slate-400 pl-6 ml-4 rounded space-y-3">
                        <x-answer.user name="{{$answer->user->name}}" time="{{$answer->created_at->diffForHumans()}}"/>
                        <x-answer.text text="{{$answer->answer}}" />
                        <x-answer.buttons />
                    </div>
                @endforeach
            </div>
        @endguest
    </div>
@endsection