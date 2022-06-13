@extends('layouts.dashboard')

@section('title')
    Bookmarks | {{ auth()->user()->name ? auth()->user()->name : ''  }}
@endsection

@section('content')
    <div class="w-full">   
        <x-page-header text="Bookmarked Questions"/>
        <div class="border divide-y">
            @forelse ($bookmarks as $bookmark)
                <a href="{{route('questions.show', [$bookmark->question, $bookmark->question->slug])}}" class="flex items-center justify-between py-2 px-4 transition hover:bg-neutral-100">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                        <div>
                            <div>{{$bookmark->question->title}}</div>
                            <div class="text-xs text-slate-700">{{$bookmark->question->user->name}}</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('bookmarks.destroy', $bookmark) }}">
                        @csrf
                        @method('DELETE')

                        <button class="py-0.5 px-2 rounded bg-red-400 hover:bg-red-600 text-white flex items-center space-x-1"
                            onclick="event.preventDefault();
                            if( confirm('Are you sure you want to remove this bookmark?') ) this.closest('form').submit();"
                        >
                            Remove
                        </button>
                    </form>
                </a>
            @empty
                <div class="py-2 px-4 text-sm font-medium">
                    You currently have no questions bookmarked.
                </d>
            @endforelse
        </div>
    </div>
@endsection

