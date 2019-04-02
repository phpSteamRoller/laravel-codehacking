@extends('layouts.admin')


@section('content')
<h1>replys</h1>
@if (count($replies) > 0)
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post</th>
            <th>Body</th>
            <th>Author</th>
            <th>Is Activ</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($replies as $reply)
        <tr>
                <td scope="row">{{ $reply->id }}</td>
                <td><a href="{{ route('home_post', $reply->comment->post->id) }}">{{ $reply->comment->body }}</a></td>
                <td>{{ $reply->body }}</td>
                <td>{{ $reply->author }}</td>
               
                <td>

 
                    @if ($reply->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentsRepliesController@update', $reply->id]]) !!}
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                          {!! Form::submit('Un-approve reply', ['class' => 'btn btn-danger']) !!}
                         
                        </div>
                        {!! Form::close() !!}

                    @else

                    {!! Form::open(['method'=>'PATCH', 'action'=>['CommentsRepliesController@update', $reply->id]]) !!}
                    <input type="hidden" name="is_active" value="1">
                    <div class="form-group">
                      {!! Form::submit('Approve reply', ['class' => 'btn btn-info']) !!}
                      
                    </div>
                    {!! Form::close() !!}


                    @endif
                   
                   
                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsRepliesController@destroy', $reply->id]]) !!}
                
                    <div class="form-group">
                      {!! Form::submit('Delete reply', ['class' => 'btn btn-danger']) !!}
                     
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
       
       
    </tbody>
</table>
@endif
   
@endsection