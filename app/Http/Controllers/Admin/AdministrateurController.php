<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;


class AdministrateurController extends Controller {

	public function index()
	{   // Affiche la vue d'administration
		return view('admin.indexadministrateur');
	}


}
