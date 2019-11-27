@extends('layout')

@section('title', 'Edit film details')

@section('content')

<div class="row">
        <div class="large-12 columns">
            <h1>Edit Film Details</h1>
        </div>
    </div>

    <form method="post" action="/films/{{ $film->id }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="large-4 columns">
                <label>Film Title
                    <input type="text" name="title" placeholder="Add a title" value={{ $film->title }} />
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label>Film image
                    <input type="text" name="imgsrc" placeholder="please add a path"  value={{ $film->imgsrc }} />
                </label>
            </div>
            <div class="large-3 columns">
                <label>Running time (mins)
                    <input type="text" name="running_time" placeholder="please add a running time" value={{ $film->running_time }} />
                </label>
            </div>
            <div class="large-3 columns">
                <label>Release date
                    <input type="date" name="release_date" placeholder="please add a release date" value={{ $film->release_date }} />
                </label>
            </div>

            <div class="large-3 columns">
                <label>Budget
                    <input type="text" name="budget" placeholder="please add a budget in numbers" value={{ $film->budget }} />
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label>Film Plot
                    <textarea name="plot" rows="10" placeholder="Please keep the plot synopsis brief">{{ $film->plot }}</textarea>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <button class="button" name="submit" type="submit">Update Film</button>
            </div>
        </div>
    </form>

    <form method="post" action="/films/{{ $film->id }}">
        @method('DELETE')
        @csrf
        <div class="row">
            <div class="large-12 columns">
                <button class="button alert" name="submit" type="submit">Remove Film</button>
            </div>
        </div>
    </form>


@endsection