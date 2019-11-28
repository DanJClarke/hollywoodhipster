@extends('layout')

@section('title', 'Add a Director to the database ')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>Add a new Director</h1>
        </div>
    </div>

    <form method="post" action="/directors">

        @csrf
        <div class="row">
            <div class="large-4 columns">
                <label>Name
                    <input type="text" name="name" placeholder="Add a name" value="{{ old('name') }}" required />
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <label>Bio
                    <textarea name="bio" rows="10" placeholder="Please keep the directors bio brief" required>{{ old('bio') }}</textarea>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <button class="button" name="submit" type="submit">Add Director</button>
            </div>
        </div>
    </form>

    @include('errors')

@endsection

