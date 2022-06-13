@extends('layouts.dashboard')

@section('title')
    Update Profile | {{ auth()->user()->name ? auth()->user()->name : ''  }}
@endsection

@section('content')
    <div class="w-full">   
        <x-page-header text="Update Profile"/>
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="space-y-8">                
                <x-form.input name="name" type="text" label="Name" value="{{$user->name}}"/>
                <x-form.input name="email" type="text" label="Email" value="{{$user->email}}"/>

                @if(session()->has('message'))
                    <x-alert type="success" text="{{session()->get('message')}}" />
                @endif

                <x-form.button text="Update" />
            </div>
        </form>
    </div>
@endsection

