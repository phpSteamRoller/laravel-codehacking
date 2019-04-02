@extends('layouts.blog-post')


@section('content')
 <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>Posted  {{ $post->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{ $post->body }}</p>

                <hr>

                <!-- Blog Comments -->

             @if (Auth::check())

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store' ]) !!}

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                     {!! Form::textarea('body', null, ['class'=>'form-group', 'rows' => 3]) !!}
                    </div>

                    <div class="form-group">
                     {!! Form::submit('Leve comment', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! form::close() !!}
                </div>

                <hr>

                @if(Session::has('comment_message'))
                       <div class="alert alert-primary" role="alert">
                           <strong>{{ session('comment_message') }}</strong>
                       </div>
                @endif
                 
             @endif

                <!-- Posted Comments -->

                <!-- Comment -->
                @if (count($comments))
                    @foreach ($comments as $comment)
                    <div class="media">{{ $comment->author }}
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <small>{{ $comment->created_at }}</small>
                            </h4>
                           {{ $comment->body }}



                             

                           @if (count($comment->replies) > 0)
                           @foreach ($comment->replies as $reply)
                            <!-- Nested Comment -->

                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $reply->author }}
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                {{ $reply->body }}
                            </div>

                            <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['method' => 'POST', 'action' => 'CommentsRepliesController@reply' ]) !!}

                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <div class="form-group">
                     {!! Form::textarea('body', null, ['class'=>'form-group', 'rows' => 3]) !!}
                    </div>

                    <div class="form-group">
                     {!! Form::submit('Leve comment', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! form::close() !!}
                </div>

                        </div>
                        <!-- End Nested Comment -->
                        @endforeach
                        @endif

                        </div>
                    </div>
    
                    @endforeach

               
                @endif
           

    
@endsection