<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use Request;

class UtilisateurController extends Controller {

	/**
	 * Trait : génère un nom aléatoire pour la Datatable
	 *         Donner le chemin absolu
	 *
	 * @return string
	 */
	use \App\Mytraits\RandomTableIdTrait;

	/**
	 * Affiche tous les utilisateurs dans une datatable
	 *
	 * @return view
	 */

	public function liste()
	{
		$users = User::all();
		$randomTableId = $this->RandomTableId(10);

		return view('admin.utilisateur.liste', compact('users','randomTableId'));
	}

	/**
	 * Creer un utilisateur
	 *
	 * @return view
	 */

	public function creer(Request $request)
	{
	 	// lists pour peupler le select
		$roles = Role::lists('display_name','name'); 

	 	// pour peupler si erreur 
		$user = Request::all();

		return view('admin.utilisateur.creer',compact('user','roles'));
	}

	 /**
	 * Handle de la form creer utilisateur
	 * POST admin/utilisateur/creer
	 *
	 * @return Response
	 */
	 public function handlecreer(Requests\CreerUtilisateurRequest $request)
	 {
	 	// handle create form 
	 	$user = new User($request->except('password','role'));
	 	$user->password = Hash::make(Request::input('password'));
	 	$user->save();

		// recherche une instance de Role correspondant au role sélectionné dans la form
		$role = Role::where('name', Request::input('role'))->first(); // retourne OBJET
		// attach le role à l'utilisateur
		$user->attachRole($role);

		// Options Flash : info success error warning overlay 
		Flash::message('Utilisateur "'.Request::input('name').'" créé.');

		return redirect()->action('Admin\UtilisateurController@liste');
	}


	/**
	 * Affiche l'utilisateur à modifier
	 *
	 * @return view
	 */

	public function modifier(User $user)
	{ 
		// modification interdite
		if ($user->name == 'Super Administrateur')
		{
			Flash::overlay('L\'utilisateur "'. $user->name .'" ne peut pas être modifié.','Modification interdite');

			return redirect()->action('Admin\UtilisateurController@liste');
		}

		//lists pour peupler le select
		$roles = Role::lists('display_name','name'); 
		// Affiche la vue modifier
		return view('admin.utilisateur.modifier',compact('user','roles'));
	}

	public function handlemodifier(Requests\ModifierUtilisateurRequest $request)
	{
	 	// handle de la form update
		$user = User::findOrFail(Request::input('id'));
	 	// tous les champs sauf password, role
		$user->fill($request->except('password','role'));

		// ON MODIFIE LE PWD DANS UNE ACTION / VUE SPECIFIQUE
		//$user->password = Hash::make(Request::input('password'));

		$user->save();
		
		// Recherche **les roles** de l'utilisateur et les détaches
		//dd($user->roles()->get()->toArray());
		$user->detachRoles($user->roles()->get()); // detach plusieurs roles s'ils existent
		
		// Attache le nouveau role sélectionné
		// recherche une instance de Role correspondant au role sélectionné dans la form
		$role = Role::where('name', Request::input('role'))->first(); // retourne OBJET
		// attach le role à l'utilisateur
		$user->attachRole($role);
		
		// Options Flash : info success error warning overlay 
		Flash::message('L\'utilisateur "'.Request::input('name').'" a été modifié.');

		return redirect()->action('Admin\UtilisateurController@liste');
	}

	public function pwdmodifier(User $user)
	{ 
		// modification interdite
		if ($user->name == 'Super Administrateur')
		{
			Flash::overlay('L\'utilisateur "'. $user->name .'" ne peut pas être modifié.','Modification interdite');

			return redirect()->action('Admin\UtilisateurController@liste');
		}

		// Affiche la vue modifier
		return view('admin.utilisateur.pwdmodifier',compact('user'));
	}

		public function handlepwdmodifier(Requests\ModifierPwdRequest $request)
	{
	 	// handle de la form update
		$user = User::findOrFail(Request::input('id'));
	 	// tous les champs sauf password, role
		//$user->fill($request->except('password','role'));

		// ON MODIFIE UNIQUEMENT LE PWD 
		$user->password = Hash::make(Request::input('password'));

		$user->save();
				
		// Options Flash : info success error warning overlay 
		Flash::message('Le mot de passe de l\'utilisateur "'.$user->name.'" a été modifié.');

		return redirect()->action('Admin\UtilisateurController@liste');
	}

	/**
	 * Utilisateur à supprimer
	 * GET /admin/utilisateur/supprimer/{id}
	 * @param  int  $id
	 * @return Response
	 */

	public function supprimer(User $user)
	{
	 	// suppression interdite
		if ($user->name == 'Super Administrateur')
		{
			Flash::overlay('L\'utilisateur "'. $user->name .'" ne peut pas être supprimé.','Suppression interdite');

			return redirect()->action('Admin\UtilisateurController@liste');
		}
		// affiche la vue de suppression
		return view('admin.utilisateur.supprimer',compact('user'));
	}


	/**
	 * Handle of the delete confirmation page
	 * POST /admin/utilisateur/supprimer
	 *
	 * @return Response
	 */
	public function handlesupprimer()
	{
	 	// handle de la form delete

		$id = Request::input('user');
		$user = User::findOrFail($id);
		$nom = $user->name;
		$user->delete();

		// Options Flash : info success error warning overlay 
		// Flash::overlay('titre de l\'overlay', 'Enregistrement supprimé (option "overlay")');
		Flash::overlay('L\'utilisateur "'. $nom .'" a été supprimé.','Enregistrement supprimé');

		return redirect()->action('Admin\UtilisateurController@liste');
	}


}
