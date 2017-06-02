<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function login(Request $request) {

		// dd($request);
		if ($request->isMethod('post')) {
			//dd($request);
			$this->validate($request, [
				'email' => 'required|email',
				'password' => 'required|between:6,10',
				'remember-me' => 'in:remember'
			], [
				'email.required' => 'Email obligatoire',
				'email.email' => 'Syntax email non valide',
				'password.between' => 'Le mot de passe doit être compris entre 8 à 10 caractères',
				'password.required' => 'Le mot de passe est obligatoire'
			]);

			if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				session()->flash('message', 'Bienvenue dans le dashboard');
				return redirect()->intended('admin/dashboard');
			}

			session()->flash('message', 'Email ou Mot de passe invalide');
			return back()->withInput(['email' => $request->email]);
		}
		
		return view('auth.login');
	}

	public function logout() {
		Auth::logout();
		session()->flash('message', 'Vous avez bien été déconnecté');
		return redirect()->home();
	}
}
