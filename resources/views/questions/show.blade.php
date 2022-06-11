@extends('layouts.app')

@section('main')
    <x-question.index :question="$question" />
@endsection