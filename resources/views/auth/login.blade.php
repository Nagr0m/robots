@extends('layouts.admin')

@section('title', 'Login')

@section('content')
<div class="container">
	<div class="row">
		<form class="col s12" action="{{url('login')}}" method="post" novalidate>
			{{csrf_field()}}
			<div class="row">
				<div class="col s12 m4 offset-m4">
					<div class="card-panel grey lighten-4">
						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='email' name='email' id='email' value="{{old('email')}}" />
								<label for='email'>Email</label>
								@if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif
							</div>
						</div>

						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='password' name='password' id='password' />
								<label for='password'>Mot de Passe</label>
								@if($errors->has('email')) <span class="error">{{$errors->first('password')}}</span> @endif
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input type="checkbox" class="filled-in" name="remember-me" id="remember-me" value="remember" {{old('remember-me')? 'checked' : ''}}/>
								<label for="remember-me">Se souvenir de moi</label>
							</div>
						</div>

						<div class='row'>
							<button type='submit' name='btn_login' class='col s6 offset-s6 btn btn-large waves-effect indigo accent-4'>Login</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection