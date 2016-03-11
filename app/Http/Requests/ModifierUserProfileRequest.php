<?php namespace App\Http\Requests;

use Response; // ajouté
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ModifierUserProfileRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// Accès réservé aux roles ayant la permission "perm_utilisateur" 
		if (Auth::check()) {
			if (Auth::user()->can('perm_utilisateur')) {
				return true; // OK, continuer le Request
			}
		}
		return false; // ne peut pas créer d'utilisateur
	}


	// Redirige vers une vue si authorize = false
	public function forbiddenResponse()
{
    // Optionally, send a custom response on authorize failure
    // (default is to just redirect to initial page with errors)
    //
    // Can return a response, a view, a redirect, or whatever else

    return response()->view('errors.403');
}


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		// $this->id
		return [
		'name' 		=> 'required | min:3',
		'email'		=> 'required | email | max:255 | unique:users,email,' . $this->id
		];
	}

}

