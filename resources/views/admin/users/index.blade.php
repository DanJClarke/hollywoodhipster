@extends('layouts.app')

@section('title', 'User administration')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>Users</h1>
            <table >
                <thead>
                    <tr>
                        <th width="200">Users id</th>
                        <th>Users Name</th>
                        <th>Users Email</th>
                        <th>User Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td>
                                @can(['manage-users'])
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="success button">Edit</a>
                                @endcan
                                @can('delete-users')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="alert button">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
