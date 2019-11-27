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
                    <input type="text" name="title" placeholder="Add a title" />
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label>Film image
                    <input type="text" name="imgsrc" placeholder="please add a path" />
                </label>
            </div>
            <div class="large-3 columns">
                <label>Running time (mins)
                    <input type="text" name="running_time" placeholder="please add a running time" />
                </label>
            </div>
            <div class="large-3 columns">
                <label>Release date
                    <input type="date" name="release_date" placeholder="please add a release date" />
                </label>
            </div>

            <div class="large-3 columns">
                <label>Budget
                    <input type="text" name="budget" placeholder="please add a budget in numbers" />
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>Film Plot
                    <textarea name="plot" rows="10" placeholder="Please keep the plot synopsis brief"></textarea>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <button class="button" name="submit" type="submit">Add Film</button>
            </div>
        </div>
    </form>

@endsection
