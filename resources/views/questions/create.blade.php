@extends('layouts.app')

@section('main')
    <x-page-header text='Create A New Question' />

    <form action="{{route('questions.store')}}" method="POST">
        @csrf

        <div class="space-y-8">
            <x-alert type="success" text="Question added successfully!" />
            <div>
                <label for="title">Question</label>
                <input name="title" class="form-input" type="text" max="255" placeholder="Ask a question." />
                @error('title')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" class="form-input" rows="4" placeholder="Add some additional information."></textarea>
                @error('content')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <x-form.button text="Create New" />
        </div>
    </form>
@endsection