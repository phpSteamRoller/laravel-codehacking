@extends('layouts.admin')


@section('content')

@if($photos)

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
    
        </tr>
    </thead>
    <tbody>
        @foreach ($photos as $photo)
        <tr>
                <td scope="row">{{ $photo->id }}</td>
                <td><img height="50" src="{{ $photo->file }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                    <div class="form-group">
                    {!! Form::submit('Delete Photo', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}   
                </td>
            </tr>
        @endforeach
      
        
    </tbody>
</table>

@endif
    
@endsection