<div>
	Catégorie : 
	<a href="{{ url('category', $robot->category->id) }}"><span class="chip">{{ $robot->category->title }}</span></a>
</div>
<div>
	Tags : 
	@forelse($robot->tags as $rtag)
		@if (isset($tag->id) && $tag->id == $rtag->id)
			<span class="chip waves-effect teal lighten-2">{{ $rtag->title }}</span>
		@else
			<a href="{{ url('tag', $rtag->id) }}"><span class="chip waves-effect">{{ $rtag->title }}</span></a>
		@endif
	@empty
		<p>Aucun tags</p>
	@endforelse
</div>