@extends('layouts.master')

@section('header')
	@include('includes.header')
@endsection

@section('content')

<!--Form dang bai -->
<section class="new-post col-md-6 col-md-offset-3">
	<h3>What do you want to share?</h3>
	<form action="{{ route('entry.store') }}" method="post">
		<div class="form-group">
			<label for="title">Title</label>
			<input class="form-control" type="text" name="title" id="title">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="body" rows="5" placeholder="content"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Post</button>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	<hr>
</section>

<!-- Main Content -->
    <div class="container">
        <div class="row">
        
            
           	@if($entry)
            <div class="col-md-10 col-md-offset-2">
	            <div class="post-preview">
                    
                        <h2 class="post-title">
        	                {{ $entry->title }}
                        </h2>
                        <p class="post-subtitle">
                            {{ $entry->body }}
                        </p>
	                    <p class="post-meta">Posted by <a href="#"><strong>{{ $entry->user->name }}</strong></a> at {{ date('F nS, Y - g:iA', strtotime($entry->created_at)) }}</p>
	            </div>
	            <hr>
            </div>
            
            <div class="col-md-10 col-md-offset-2">
            <h4 class="comment-title"><span class="glyphicon glyphicon-comment"></span> n comments</h4>
            <!-- Noi dung binh luan -->
            @foreach($entry->comments as $comment)
                <div class="comment">
                    <div class="user-info">
                        <image class="user-ava" src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( "duylxbk57@gmail.com") ) ) . "?s=50&d=mm"}}"></image>
                        <div class="user-name">
                            <h4>{{ $comment->user->name }}</h4>
                            <p class="comment-time">
                                {{ date('F nS, Y - g:iA', strtotime($comment->created_at) ) }}
                            </p>
                        </div>
                        <div class="comment-body">
                            {{ $comment->content }}
                        </div>
                    </div>
                </div>
            @endforeach
                <!--Ket thuc noi dung binh luan -->
            </div>

            <!-- Form submit comment -->
            <div class="col-md-8 col-md-offset-2">
                <div class="new-comment">
                    <form action="{{ route('comment.store') }}" method="post" id="form-comment">
                        <div class="form-group">
                            <input type="hidden" name="entry_id" value="{{ $entry->id }}"/>
                            <textarea name="content" class="form-control" placeholder="your comment..." rows="3"></textarea>
                                                
                            <span class="glyphicon glyphicon-send" type="submit" id="icon-submit-comment"></span>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </form>
                </div>
            </div>
            @else
                {!! abort(404) !!}
			@endif
            
        </div>
    </div>
 
@endsection

@section('footer')

@endsection