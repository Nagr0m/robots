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