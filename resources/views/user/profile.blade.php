@extends('layouts.master')

@section('content')
<div style="width:100%; height:400px;">
  @include('includes.header')
</div>
 
<div class="container">
<div class="row">
<!-- <h1 style="text-align:center">User Profile</h1> -->
<!-- code start -->
<div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

  <div>
    <div class="twPc-button">
            <a href="#" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">{{$userInfo->email}}</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            @if( Auth::check() )
              @if(Auth::user()->id != $user_id)
      
                  @if ( $followed == false )
                      <form action="{{ route('userfollow.store') }}" method="post">
                          <input type="hidden" name="follower_id" value="{{ $user_id }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button class="btn small btn-primary" type="submit">Follow</button>
                      </form>
                  @else
                      <form action="{{ route('userfollow.delete') }}" method="post">
                          <input type="hidden" name="follower_id" value="{{ $user_id }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button class="btn small btn-primary" type="submit">UnFollow</button>
                      </form>
                  @endif                
                
              @endif
            @else
                      <form action="{{ route('userfollow.store') }}" method="post">
                          <input type="hidden" name="follower_id" value="{{ $user_id }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button class="btn small btn-primary" type="submit">Follow</button>
                      </form>
            @endif
            
            <!-- Twitter Button -->   
    </div>

    <a title="{{$userInfo->name}}" href="https://facebook.com/telosna" class="twPc-avatarLink">
      <img alt="$userInfo->name" src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( "duylxbk57@gmail.com") ) ) . "?s=50&d=mm"}}">
    </a>

    <div class="twPc-divUser">
      <div class="twPc-divName">
        {{ $userInfo->name }} 
      </div>

      <!-- <span>
        <a href="https://facebook.com/telosma">@<span>Telosma</span></a>
      </span> -->
    </div>

    <div class="twPc-divStats">
      <ul class="twPc-Arrange">
        <li class="twPc-ArrangeSizeFit">
          <a href="https://facebook.com/telosma" title="9.840 Tweet">
            <span class="twPc-StatLabel twPc-block">Entries</span>
            <span class="twPc-StatValue">{{ $userInfo->numEntry }}</span>
          </a>
        </li>
        <li class="twPc-ArrangeSizeFit">
          <a href="https://facebook.com/telosma" title="885 Following">
            <span class="twPc-StatLabel twPc-block">Following</span>
            <span class="twPc-StatValue">{{ $userInfo->numFollowing }}</span>
          </a>
        </li>
        <li class="twPc-ArrangeSizeFit">
          <a href="https://facebook.com/telosma" title="1.810 Followers">
            <span class="twPc-StatLabel twPc-block">Followers</span>
            <span class="twPc-StatValue">{{ $userInfo->numFollower }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- code end -->
</div>
</div>
@section('content')