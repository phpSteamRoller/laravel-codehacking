@extends('layouts.admin')

@section('content')
    <h1>All Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ovner</th>
                <th>Category Id</th>
                <th>Photo</th>
                <th>Title</th>
                <th>body</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                
         
            @foreach ($posts as $post)
            <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->user->name  }}</a></td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                     @if ($post->photo)
                        <img height="50" src="{{ $post->photo->file }}" alt="">
                    @endif 
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
            @endforeach

            @endif
           
           
            
        </tbody>
    </table>
@endsection