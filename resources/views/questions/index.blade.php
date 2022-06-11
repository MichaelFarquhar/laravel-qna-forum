@extends('layouts.app')

@section('main')
    <x-page-header text='Questions' />
    @foreach ($questions as $question)
        <x-question.index :question="$question" />
    @endforeach
@endsection