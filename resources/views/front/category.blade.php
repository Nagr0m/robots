@extends('layouts.master')

@section('title', 'Catégorie - '. $cat->title)

@section('sidebar')
    <p>This is the sidebar.</p>
@endsection

@section('content')
	<h1>{{ $cat->title }}</h1>
	<div class="row">
		<div class="col s12">
		@forelse ($robots as $robot)
			<div class="card horizontal">
				<div class="card-image">
					<img src="{{ url('images', $robot->link) }}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<a href="{{url('robot', $robot->id)}}"><span class="card-title grey-text text-darken-4">{{ $robot->name }}</span></a>
						<p>{{ str_limit($robot->description, 100, '...') }}</p>
						@include('partials.metacat')
					</div>
				</div>
			</div>
		@empty
			<p>Aucun robot trouvé</p>
		@endforelse
		</div>    
	</div>
    
@endsection