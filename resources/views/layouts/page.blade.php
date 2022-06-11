@extends('layouts.app')

@section('title')
    @yield('title')
@endsection

@section('main')
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>
@endsection