@extends('layouts.master')

@section('title', 'Robot - '. $robot->name)

@section('sidebar')
    <p>This is the sidebar.</p>
@endsection

@section('content')
	<div class="row">
		<div class="col s12">
			<img src="{{ url('images', $robot->link) }}" alt="Logo" class="responsive-img" style="float:left;">
			<h1>{{ $robot->name }}</h1>
			<p>{{ $robot->description }}</p>
			@include('partials.meta')
		</div>    
	</div>
@endsection