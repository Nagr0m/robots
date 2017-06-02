<header class="header">
	@section('header')
		<nav class="green darken-3">
			<div class="nav-wrapper container">
				<a href="{{ route('home') }}" class="brand-logo">Logo</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li {{ $current == 'home' ? 'class=active' : '' }}><a href="{{ route('home') }}">Accueil</a></li>
					@forelse ($categories as $navcat)
						<li {{ $current == $navcat->id ? 'class=active' : '' }}><a href="{{ url('category', $navcat->id) }}">{{$navcat->title}}</a></li>
					@empty
					@endforelse
					@if(auth()->check())
						<li><a href="{{route('dashboard')}}"><i class="material-icons">dashboard</i></a></li>
						<li><a href="{{ route('logout') }}"><i class="material-icons">exit_to_app</i></a></li>
						@else
						<li>
						<a href="{{route('login')}}"><i class="material-icons">person</i></a>
						</li>
					@endif
				</ul>
			</div>
		</nav>
	@show
</header>