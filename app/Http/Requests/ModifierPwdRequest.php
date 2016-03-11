<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModifierPwdRequest extends Request {

	/**
	 * UTILISE PAR LES CONTROLLEUR UTILISATEUR ET USERPROFILE
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
				'password' 	=> array('required' ,
						 'confirmed',
						 'min:6',
						 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'),
		];
	}

}
