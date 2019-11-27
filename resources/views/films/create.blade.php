@extends('layout')

@section('title', 'welcome')

@section('content')


    <div class="row">
        <div class="large-12 columns">
            <h1>Add a new Film</h1>
        </div>
    </div>

    <form method="post" action="/films">
        @csrf
        <div class="row">
            <div class="large-4 columns">
                <label>Film Title
                    <input type="text" {{ $errors->has('title') ? "class='warning'" : "" }} name="title" placeholder="Add a title" value="{{ old('title') }}" required/>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label>Film image
                    <input type="text" {{ $errors->has('imgsrc')  ? "class='warning'" : "" }} name="imgsrc"  placeholder="please add a path" value="{{ old('imgsrc') }}" required />
                </label>
            </div>
            <div class="large-3 columns">
                <label>Running time (mins)
                    <input type="text"  {{ $errors->has('running_time')  ? "class='warning'" : "" }} name="running_time" placeholder="please add a running time" value="{{ old('running_time') }}" required />
                </label>
            </div>
            <div class="large-3 columns">
                <label>Release date
                    <input type="date" {{ $errors->has('release_date')  ? "class='warning'" : "" }} name="release_date" placeholder="please add a release date" value="{{ old('irelease_date') }}" required />
                </label>
            </div>

            <div class="large-3 columns">
                <label>Budget
                    <input type="text" name="budget" {{ $errors->has('budget') ? "class='warning'" : "" }} placeholder="please add a budget in numbers" value="{{ old('budget') }}" required />
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>Film Plot
                    <textarea name="plot" rows="10" {{ $errors->has('budget') ? "class='warning'" : "" }} placeholder="Please keep the plot synopsis brief"  required />{{ old('plot') }}</textarea>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <button class="button" name="submit" type="submit">Add Film</button>
            </div>
        </div>
    </form>

    @include('errors')

@endsection
