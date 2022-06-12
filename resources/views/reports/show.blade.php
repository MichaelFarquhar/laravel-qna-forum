@extends('layouts.app')

@section('title', 'Submit a Report')

@section('main')
    <x-page-header text='Report Question' />

    @if(session()->has('message'))
        <x-alert type="success" text="{{session()->get('message')}}" />
    @else
        <div class="mb-6 border rounded-xl p-3 bg-neutral-100">
            <div>{{$question->title}}</div>
            <div class="text-xs text-slate-700">{{$question->user->name}}</div>
        </div>
        <form action="{{route('reports.store')}}" method="POST">
            @csrf

            <div class="space-y-8">
                <input type="hidden" name="question_id" value="{{$question->id}}">
                <x-form.input name="reason" type="textarea" placeholder="Please write your reason for this report." label="Reason"/>
                <x-form.button text="Submit" />
            </div>
        </form>
    @endif
@endsection