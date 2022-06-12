@extends('layouts.app')

@section('title', 'Create A Question')

@section('main')
    <x-page-header text='Create A New Question' />

    <form action="{{route('questions.store')}}" method="POST">
        @csrf

        <div class="space-y-8">
            @if(session()->has('message'))
                <x-alert type="success" text="{{session()->get('message')}}" />
            @endif
            
            <x-form.input name="title" type="text" placeholder="Ask a question" label="Question"/>
            <x-form.input name="content" type="textarea" placeholder="Add some additional information." label="Content"/>
        
            <div>
                <select name="topic" id="topic">
                    <option value="">Select topic or create a new one</option>
                    @foreach ($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
                </select>
                @error('topic')
                    <div class="text-sm text-red-600 py-1.5 px-3">{{ $message }}</div>
                @enderror
            </div>


            <x-form.button text="Create New" />
        </div>
    </form>

    <script>
        $(function () {
            $("select").selectize({
                persist: false,  // This will make it so new topics don't stick around as an option
                placeholder: 'Choose a topic or create a new one.',
                maxItems: '1',
                closeAfterSelect: true,
                create: function(input) {
                    // When a new topic is requested, it's value will be 'new'
                    // This will signal the controller to create a new topic
                    return {
                        text: input,
                        value: input
                    }
                }
            });
        });
    </script>
@endsection