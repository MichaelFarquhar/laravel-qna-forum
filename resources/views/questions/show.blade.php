@extends('layouts.app')

@section('main')
    <x-question.single :question="$question" />
@endsection