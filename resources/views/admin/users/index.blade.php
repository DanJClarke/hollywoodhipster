@extends('layout')

@section('title', 'All films and Directors')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>Users</h1>
            <ul>
                @foreach($users as $user)
                {{ $user->name }} - {{ $user->email }}
                @endforeach
            </ul>
            <br/>
        </div>
    </div>

@endsection
