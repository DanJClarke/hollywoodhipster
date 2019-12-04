@extends('layouts.app')

@section('title', 'Edit directors details')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>Edit Directors Details</h1>
        </div>
    </div>

    <form method="post" action="/manage-directors/{{ $director->id }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="large-4 columns">
                <label>Name
                    <input type="text" name="name" placeholder="Add a name" value="{{ $director->name }}" required />
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <label>Bio
                    <textarea name="bio" rows="10" placeholder="Please keep the directors bio brief" required>{{ $director->bio }}</textarea>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <button class="button" name="submit" type="submit">Update Film</button>
            </div>
        </div>
    </form>

    @include('errors')
    <div class="row">
        <div class="large-12 columns">
            <a href="/manage-directors">&laquo; Back to all Directors</a>
        </div>
    </div>

@endsection
