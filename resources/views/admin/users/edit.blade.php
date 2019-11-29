@extends('layout')

@section('title', 'Edit User role')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>Edit User {{ $user->name }}</h1>
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="large-6 columns">
                        @foreach($roles as $role)
                            <span class="role">
                                <input id="role{{ $role->id }}" name="roles[]" type="checkbox" value="{{ $role->id }}"
                                    @if ($user->roles->pluck('id')->contains($role->id)) checked @endif
                                >
                                <label for="role{{ $role->id }}">{{ $role->name }}</label>
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <button class="button" name="submit" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


