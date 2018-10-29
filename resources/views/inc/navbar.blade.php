<nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav text-uppercase">

                        <!-- Authentication Links -->
                        @guest
                            <li><a href="/about"><strong>About</strong></a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role= "button" href="#"><strong>Organization</strong><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                     <li><a class="dropdown-item" href="/executives"><strong>Office Bearers</strong></a></li>
                                </ul>
                            </li>
                            <li><a href="/members"><strong>Members</strong></a></li>
                            <li><a href="/meetings"><strong>Meetings</strong></a></li>
                            <li><a href="/events"><strong>Events</strong></a></li>
                            <li><a href="/gallery"><strong>Gallery</strong></a></li>
                            <li><a href="#login" data-toggle="modal" data-target="#login"><strong>Member Login</strong></a></li>

                        @else
                            <li><a href="/about"><strong>About</strong></a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role= "button" href="#"><strong>Organization</strong><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                     <li><a class="dropdown-item" href="/executives"><strong>Office Bearers</strong></a></li>
                                </ul>
                            </li>
                            <li><a href="/members"><strong>Members</strong></a></li>

                            <li><a href="/meetings"><strong>Meetings</strong></a></li>
                            <li><a href="/events"><strong>Events</strong></a></li>
                            <li><a href="/gallery"><strong>Gallery</strong></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-left" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><strong>
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </strong></a>

                                <ul class="dropdown-menu">
                                     <li>
                                        <a href="/home">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                   
                                </ul>
                            </li>
                        @endguest
                  </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


          
         
<div class=" top-banner">
    <div class="banner"></div>
</div>
<!-- Login Modal -->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog">
                <div class="loginmodal-container">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Register
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

<!-- Modal Ends -->

