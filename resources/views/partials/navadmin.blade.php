<header class="header">
	@section('header')
		<nav>
			<div class="nav-wrapper indigo darken-4">
				<a href="{{ route('home') }}" class="brand-logo">Logo</a>
				@if(auth()->check())
					<ul id="nav-mobile" class="right">
						<li><a href="{{route('dashboard')}}"><i class="material-icons">dashboard</i></a></li>
						<li><span class="chip indigo lighten-5"><img src="https://robohash.org/{{$user->name}}?set=set3" alt="">{{$user->name}}</span></li>
						<li><a href="#"><i class="material-icons">settings</i></a></li>
						<li><a href="{{ route('logout') }}"><i class="material-icons">exit_to_app</i></a></li>
					</ul>
				@endif
			</div>
		</nav>
	@show
</header>