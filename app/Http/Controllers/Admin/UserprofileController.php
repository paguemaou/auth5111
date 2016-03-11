<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Request;

class UserprofileController extends Controller {

	/*
	* Modification des champs de l'utilisateur 
	* (sauf le mot de passe qui est exclu du model)
	*/
	public function modifier(User $user)
	{   // l'utilisateur n'a pas le droit de modifier son role
		// le mot de passe est envoyé mais Hidden dans la form

		// modification interdite
		if ($user->name == 'Super Administrateur')
		{
			Flash::overlay('L\'utilisateur "'. $user->name .'" ne peut pas être modifié.','Modification interdite');

			return Redirect::to('/');
		}

		// Affiche la vue modifier
		return view('admin.userprofile.modifier',compact('user'));
	}

	/*
	* Handle de Modification des champs de l'utilisateur 
	* (sauf le mot de passe qui est exclu du model)
	*/
	public function handlemodifier(Requests\ModifierUserProfileRequest $request)
	 {
	 	// handle de la form update
	 	$user = User::findOrFail(Request::input('id'));
	 	// tous les champs sauf password (exclu du model), role
	 	// l'utilisateur ne peut pas modifier son propre role
		$user->fill($request->except('rolelectureseule')); // nom du champ dans la form

		$user->save();

		// Options Flash : info success error warning overlay 
		Flash::message('L\'utilisateur "'.Request::input('name').'" a été modifié.');

		return Redirect::to('/');
	 }

	/*
	* Modification du mot de passe de l'utilisateur connecté 
	*/
	public function pwdmodifier(User $user)
	{   // l'utilisateur n'a pas le droit de modifier son role

		// modification interdite
		if ($user->name == 'Super Administrateur')
		{
			Flash::overlay('L\'utilisateur "'. $user->name .'" ne peut pas être modifié.','Modification interdite');

			return Redirect::to('/');
		}

		// Affiche la vue modifier
		return view('admin.userprofile.pwdmodifier',compact('user'));
	}

	/*
	* Handle de modification du mot de passe de l'utilisateur connecté 
	*/
	public function handlepwdmodifier(Requests\ModifierPwdRequest $request)
	 {
	 	// handle de la form update
	 	$user = User::findOrFail(Request::input('id'));
	 	// tous les champs sauf password, role
	 	// l'utilisateur ne peut pas modifier son propre role
		$user->fill($request->except('password_confirmation'));
		$user->password = Hash::make(Request::input('password')); 
		$user->save();

		// Options Flash : info success error warning overlay 
		Flash::message('Le mot de passe de l\'utilisateur "'. $user->name .'" a été modifié.');

		return Redirect::to('/');
	 }

}
