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
<!-- ============== -->
<!-- Main Content -->
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach ($entries as $entry)
	            <div class="post-preview" data-toggle="tooltip" title="CLICK me to Read more!">
                    <a href="{{ route('entry.show', $entry->id) }}">
                        <h2 class="post-title">
        	                {{ $entry->title }}
                        </h2>
                    </a>
                        <?php 
                        if (strlen($entry->body) < 200 )
                        {
                            $pos = strlen($entry->body);
                        }
                        else
                        {
                            $pos=strpos($entry->body, ' ', 200); 
                        }
                        ?>
                    <article class="post-subtitle">

                        {{ substr($entry->body,0,$pos ) }}
                    </article>
                    
                    <p class="post-meta">Posted by <a href="{{ route('user.profile', $entry->user->id) }}">{{ $entry->user->name }}</a> {{ $entry->created_at }}</p>
	            </div>
                    <h5 class="comment-title"><span class="glyphicon glyphicon-comment"></span> {{ $entry->comments->count() }} comments</h5>
	            <hr>
	        @endforeach
                <!-- Pager -->
                <!-- <ul class="pagination">
        		    <li>
        		      <a href="#" aria-label="Previous">
        		        <span aria-hidden="true">&laquo;</span>
        		      </a>
        		    </li>
        		    <li><a href="#">1</a></li>
        		    <li><a href="#">2</a></li>
        		    <li><a href="#">3</a></li>
        		    <li><a href="#">4</a></li>
        		    <li><a href="#">5</a></li>
        		    <li>
        		      <a href="#" aria-label="Next">
        		        <span aria-hidden="true">&raquo;</span>
        		      </a>
        		    </li>
        		  </ul> -->
                  <div class="text-center">
                      {!! $entries->links() !!}
                  </div>
            </div>
        </div>
    </div>
    <hr>
 
@endsection

@section('footer')

@endsection