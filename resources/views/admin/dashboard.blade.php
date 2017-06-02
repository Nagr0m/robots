@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<main>
	<div class="row">
		<div class="col s12 m6 l3">
			<div class="card">
				<div class="card-content black-text">
					<p>Robots</p>
					<h4>{{$nbrobot}}</h4>
					{{-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="deep-orange-text text-lighten-2">from yesterday</span>
					</p> --}}
				</div>
				<div class="card-action">
					<a href="{{route('robot.index')}}" class="">Listes des robots</a>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3">
			<div class="card">
				<div class="card-content black-text">
					<p>Categories</p>
					<h4>{{$nbcat}}</h4>
					{{-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="deep-orange-text text-lighten-2">last month</span>
					</p> --}}
				</div>
				<div class="card-action">
					<a href="" class="">Listes des categories</a>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3">
			<div class="card">
				<div class="card-content black-text">
					<p>Tags</p>
					<h4>{{$nbtag}}</h4>
					{{-- <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 80% <span class="deep-orange-text text-lighten-2">from yesterday</span>
					</p> --}}
				</div>
				<div class="card-action">
					<a href="" class="">Listes des tags</a>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3">
			<div class="card">
				<div class="card-content black-text">
					<p>Utilisateurs</p>
					<h4>2</h4>
					<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-orange-text text-lighten-2">from last month</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection