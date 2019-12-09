@extends('layouts.app')

    @section('title', 'welcome')

    @section('content')
    <div id="root">
        <div id="hero">
            <parallax-parent></parallax-parent>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <h1>Movies</h1>
            </div>
        </div>
        <div class="row">
            <film-parent></film-parent>
        <div>
    </div>

    @endsection
