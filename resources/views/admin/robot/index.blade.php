@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<main>
	<div class="row">
		<div class="col s12">
			<table class="striped">
				<thead>
					<tr>
						<th width="15%">Nom</th>
						<th width="15%">Categorie</th>
						<th width="20%">Tag</th>
						<th width="10%">Image</th>
						<th width="10%" class="right-align">Status</th>
						<th width="10%" class="right-align">Date de pub</th>
						<th width="10%" class="right-align">Auteur</th>
						<th width="10%" class="center-align">Action</th>
					</tr>
				</thead>

				<tbody>
				@forelse ($robots as $robot)
					<tr>
						<td>{{$robot->name}}</td>
						<td>@if ($robot->category) {{$robot->category->title}} @else Aucune categorie @endif</td>
						<td>@forelse ($robot->tags as $tag) {{$tag->title}} @if (!$loop->last) - @endif @empty Aucun tags @endforelse</td>
						<td>{{$robot->link}}</td>
						<td class="right-align">{{$robot->status}}</td>
						<td class="right-align">@if ($robot->published_at) {{$robot->published_at->format('d/m/y - H:m')}} @else @endif</td>
						<td class="right-align">{{$robot->user->name}}</td>
						<td class="center-align">
						@can('update', $robot)
							<a href="{{route('robot.edit', $robot->id)}}"><i class="material-icons yellow-text text-darken-4">mode_edit</i></a>
							{{-- <a href=""><i class="material-icons red-text text-darken-4">delete_forever</i></a> --}}
							<form method="post" action="{{route('robot.destroy', $robot->id)}}" style="display: inline-block;">
								{{method_field('DELETE')}}
								{{csrf_field()}}
								<button type="submit" name="submit" style="display: inline; margin: 0; padding: 0; background: none; border: none;"><i class="material-icons red-text text-darken-4">delete_forever</i></button>
							</form>
						@endcan
						</td>
					</tr>
				@empty
					<p>Aucun robot trouvé</p>
				@endforelse
				</tbody>
			</table>
			<div class="col s12 center-align">{{$robots->links()}}</div>
		</div>
	</div>
</main>

<div class="fixed-action-btn">
	<a href="{{route('robot.create')}}" class="btn-floating btn-large light-green">
		<i class="large white-text material-icons">add</i>
	</a>
</div>
@endsection