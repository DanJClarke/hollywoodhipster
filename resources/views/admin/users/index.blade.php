@extends('layout')

@section('title', 'All films and Directors')

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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="success button">Edit</a>
                                <a href="{{ route('admin.users.destroy', $user->id) }}" class="alert button">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
