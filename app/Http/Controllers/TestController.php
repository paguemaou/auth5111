<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Permission;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller {

	public function droitsUtilisateurs() 
	{
		// on récupère tous les utilisateurs
		// pour les afficher ainsi que les
		// droits issus de Entrust
		$users = User::all();
		$permissions = Permission::all();

		return view('index', compact('users','permissions'));

	}

}
