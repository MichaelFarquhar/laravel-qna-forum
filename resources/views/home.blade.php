{{-- {{dd($questions)}} --}}

@extends('layouts.page')

@section('content')
    <x-page-header text="Recent Questions">
        @if($questions->count() === 20)
            <a href="{{route('questions.index')}}" id="allQuestions" type="submit" class="h-fit font-semibold py-1 px-3 border rounded-lg text-white bg-gray-700 hover:bg-gray-600 transition">
                View All Questions
            </a>
        @endif
    </x-page-header>
    <div class="grid md:grid-cols-2 gap-8">
        @foreach ($questions as $question)
            <x-question.index :question="$question" />
        @endforeach
    </div>
@endsection
  