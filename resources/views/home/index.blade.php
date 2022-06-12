{{-- {{dd($questions)}} --}}

@extends('layouts.page')

@section('content')
    <div class="grid md:grid-cols-2 gap-8">
        @foreach ($questions as $question)
            <x-question.index :question="$question" />
        @endforeach
    </div>
@endsection
  