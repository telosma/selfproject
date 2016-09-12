  <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Telosma Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    
                    @if(Auth::check())
                    <li>
                        <a id="a-create-entry">Create new entry</a>
                    </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('user.profile', Auth::user()->id) }}">Profile</a></li>
                          <li><a href="{{ route('entry.index') }}">My Entries</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ route('signout') }}">Sign-out</a></li>
                        </ul>
                      </li>
                    @else
                    <li>
                        <a href="{{ route('signup') }}">Sign-up</a>
                    </li>
                    <li>
                        <a href="{{ route('signin') }}">Sign-in</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{ url('images/header-bg.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Telosma Blog</h1>
                        <hr class="small">
                        <span class="subheading">From Asia to the World</span>
                    </div>
                </div>
            </div>
        </div>
    </header>