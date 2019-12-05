@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>User Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <p>Hi {{ Auth::user()->name }}, welcome to your movie dashboard!</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <ul>
                @can('edit-users')
                    <li>
                        <a  href="{{ route('admin.users.index') }}">
                            User management
                        </a>
                    </li>
                @endcan

                @can('edit-users')
                    <li>
                        <a  href="manage-films/">
                            Manage Films
                        </a>
                    </li>
                @endcan

                @can('add-reviews')
                    <li>
                        <a  href="/manage-my-reviews/{{ Auth::user()->id }}">
                            Manage my Reviews
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
@endsection
