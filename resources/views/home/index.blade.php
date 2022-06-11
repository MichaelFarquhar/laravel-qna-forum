{{-- {{dd($questions)}} --}}

@extends('layouts.page')

@section('content')
    <div class="grid grid-cols-2 gap-8">
        @foreach ($questions as $question)
            <x-home.question :question="$question" />
        @endforeach
    </div>
@endsection
  