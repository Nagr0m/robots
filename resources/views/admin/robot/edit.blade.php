@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<form class="container" action="{{-- {{route('robot.update')}} --}}" method="post" novalidate>
	@if ($errors->count() > 0)
	<div class="row">
		<div class="col s12">
			<div class="card-panel red white-text">
				@foreach ($errors->all() as $message)
					{{$message}} <br>
				@endforeach
				
			</div>
		</div>
	</div>
	@endif

	{{csrf_field()}}
	<div class='row'>
		<div class='input-field col s12'>
			<input class='validate' type='text' name='name' id='name' value="{{$robot->name}}" />
			<label for='name'>Nom</label>
			{{-- @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif --}}
		</div>
	</div>

	<div class='row'>
		<div class='input-field col s12'>
			<textarea class='validate materialize-textarea' name='description' id='description'>{{$robot->description}}</textarea>
			<label for='description'>Description</label>
			{{-- @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif --}}
		</div>
	</div>
	
	<div class='row'>
		<div class='input-field col s12'>
			<select name='category_id' id='category_id' class="selectmaterial">
				<option value="">Sectionner votre categorie</option>
				@foreach ($categories as $id => $title)
				<option value="{{$id}}" {{ selected_fields($id,  $robot->category_id, 'selected') }}>{{$title}}</option>
				@endforeach
			</select>
			<label for='category_id'>Categorie</label>
			{{-- @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif --}}
		</div>
	</div>

	<div class="row">
		<div class='input-field col s12' style="display: flex; flex-flow: row wrap; justify-content: space-around;">
			@foreach ($tags as $id => $title)
			<div>
				<input type="checkbox" name="tags[]" value="{{$id}}" id="tag{{$id}}" {{ selected_fields($id, $robot->tags->pluck('id')->toArray()) }}/>
				<label for="tag{{$id}}" style="padding-left: 25px;">{{$title}}</label>
			</div>
			@endforeach
			{{-- @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif --}}
		</div>
	</div>

	<div class="row">
		<div class="file-field input-field col s12">
			<div class="btn">
				<span>Image</span>
				<input type="file">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="switch col s6">
			<label>
				Non publié
				<input type="checkbox" name="status" value="published" {{ selected_fields('published',  $robot->status) }}>
				<span class="lever"></span>
				Publié
			</label>
		</div>
		<div class="input-field col s6">
			<input type="submit" class="btn right" value="Créer">
		</div>
	</div>
	
</form>

@endsection