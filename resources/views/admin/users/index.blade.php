@extends('layouts.admin')


@section('content')



<h1>USERS</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Cretaed</th>
        </tr>
    </thead>
    <tbody>
        @if ($users)
        @foreach ($users as $user)
        <tr>
                <td scope="row">{{ $user->id }}</td>
                <td><img height = "40" src="{{ $user->photo  ? $user->photo->file : '/images/user-no-image.png' }}" alt=""></td>
                <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name  }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->is_active == 1 ? 'Active': 'Not active' }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
      
        @endif
       
     
    </tbody>
</table>
    
@endsection