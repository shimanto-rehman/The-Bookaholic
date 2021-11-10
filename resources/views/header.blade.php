<nav class="navbar navbar-default custom-navbar-height">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand logo-container" href="{{url('/')}}"></a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav btn-lg navbar-right header-menu">
				@if (Auth::guest())
					<li class=""><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
				@else
					<li><a href="{{url('profile/'. Auth::user()->id . '/notification')}}">Notification</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{url('profile/'.Auth::user()->id)}}">Profile</a></li>
							<li><a href="{{ url('/logout') }}">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>