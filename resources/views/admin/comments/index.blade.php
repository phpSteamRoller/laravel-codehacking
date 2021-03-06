@extends('layouts.admin')


@section('content')
<h1>Comments</h1>
@if ($comments)
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post</th>
            <th>Body</th>
            <th>Author</th>
            <th>Replies</th>
            <th>Is Activ</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
                <td scope="row">{{ $comment->id }}</td>
                <td><a href="{{ route('home_post', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->author }}</td>
                <td><a href="{{ route('admin.comments.replies.show', $comment->id) }}">View Replies</a></td>
               
                <td>

 
                    @if ($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                          {!! Form::submit('Un-approve comment', ['class' => 'btn btn-danger']) !!}
                         
                        </div>
                        {!! Form::close() !!}

                    @else

                    {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" name="is_active" value="1">
                    <div class="form-group">
                      {!! Form::submit('Approve comment', ['class' => 'btn btn-info']) !!}
                      
                    </div>
                    {!! Form::close() !!}


                    @endif
                   
                   
                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                
                    <div class="form-group">
                      {!! Form::submit('Delete comment', ['class' => 'btn btn-danger']) !!}
                     
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
       
       
    </tbody>
</table>
@endif
   
@endsection