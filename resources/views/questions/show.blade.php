@extends('layouts.app')

@section('main')
    <div class="border rounded-xl shadow-md">
        <div class="w-full flex items-center py-4 px-5 border-b">
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

        <div class="px-5 pb-4">
            {{-- User and topic --}}
            <div class="w-full flex items-center justify-between mb1">
                <x-question.user :question="$question" />
                <x-question.topic-pill :question="$question" /> 
            </div>
    
            {{-- Question description --}}
            <p>{{$question->content}}</p>
        </div>
    </div>

    {{-- Footer with buttons --}}
    <div class="flex items-center space-x-2 py-4 px-5">
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
            <a href="#" class="py-0.5 px-2 rounded bg-stone-400 hover:bg-stone-600 text-white flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                </svg>
                <span class="text-sm font-bold">Save</span>
            </a>
            <a href="#" class="py-0.5 px-2 rounded bg-stone-400 hover:bg-stone-600 text-white flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                </svg>
                <span class="text-sm font-bold">Share</span>
            </a>
            <a href="{{route('reports.show', ['question' => $question->id])}}" class="py-0.5 px-2 rounded bg-red-400 hover:bg-red-600 text-white flex items-center space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-bold">Report</span>
            </a>
    </div>

    <div class="px-5 mt-6">
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