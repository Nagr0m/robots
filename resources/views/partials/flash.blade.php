@if($flash = session('message'))
<div class="container flash">
	<div class="col s12">
		<div class="card-panel teal white-text">
			<span class="">{{$flash}}</span>
			<i class="material-icons right">close</i>
		</div>
	</div>
</div>
@endif