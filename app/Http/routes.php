<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

//Route::get('/', 'WelcomeController@index');
Route::get('/', 'TestController@droitsUtilisateurs');
Route::get('home', 'HomeController@index');
Route::get('test', function()
  {
  return view('template.pagelayout');
  });

/*********************/
/* Model             */
/*********************/
Route::model('user', 'App\User');

/*********************/
/* Administrateur    */
/*********************/
Entrust::routeNeedsPermission('admin/administrateur/*', 'perm_administrateur');

Route::get('admin/administrateur/index',
	array('as' => 'admin.administrateur.index',
		  'uses' => 'Admin\AdministrateurController@index'));

/* Log Viewer */
Route::get('admin/administrateur/logs', 
	       '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/*********************/
/* Admin Utilisateur */
/*********************/
Entrust::routeNeedsPermission('admin/utilisateur/*', 'perm_gestionnaire'); 

Route::get('admin/utilisateur/liste', 
	array('as' => 'admin.utilisateur.liste',
		'uses' => 'Admin\UtilisateurController@liste'));

Route::get('admin/utilisateur/creer', 
	array('as' => 'admin.utilisateur.creer',
		'uses' => 'Admin\UtilisateurController@creer'));

Route::post('admin/utilisateur/creer', // post model
	array('as' => 'admin.utilisateur.creer',
		'uses' => 'Admin\UtilisateurController@handlecreer'));

Route::get('admin/utilisateur/modifier/{user}',  // model 
	array('as' => 'admin.utilisateur.modifier',
		'uses' => 'Admin\UtilisateurController@modifier'));

Route::post('admin/utilisateur/modifier', // post model
	array('as' => 'admin.utilisateur.modifier',
		'uses' => 'Admin\UtilisateurController@handlemodifier'));

Route::get('admin/utilisateur/pwdmodifier/{user}',  // model 
	array('as' => 'admin.utilisateur.pwdmodifier',
		'middleware' => 'auth',	
		'uses' => 'Admin\UtilisateurController@pwdmodifier'));

Route::post('admin/utilisateur/pwdmodifier', // post model
	array('as' => 'admin.utilisateur.pwdmodifier',
		'middleware' => 'auth',	
		'uses' => 'Admin\UtilisateurController@handlepwdmodifier'));

Route::get('admin/utilisateur/supprimer/{user}',  // model
	array('as' => 'admin.utilisateur.supprimer',
		'uses' => 'Admin\UtilisateurController@supprimer'));

Route::post('admin/utilisateur/supprimer', // post model
	array('as' => 'admin.utilisateur.supprimer',
		'uses' => 'Admin\UtilisateurController@handlesupprimer'));

/*********************/
/* Admin Userprofile  */
/*********************/
/*  Accessible uniquement aux utilisateurs connectés*/

Route::get('admin/userprofile/modifier/{user}',  // model 
	array('as' => 'admin.userprofile.modifier',
		'middleware' => 'auth',
		'uses' => 'Admin\UserprofileController@modifier'));

Route::post('admin/userprofile/modifier', // post model
	array('as' => 'admin.userprofile.modifier',
		'middleware' => 'auth',		
		'uses' => 'Admin\UserprofileController@handlemodifier'));

Route::get('admin/userprofile/pwdmodifier/{user}',  // model 
	array('as' => 'admin.userprofile.pwdmodifier',
		'middleware' => 'auth',	
		'uses' => 'Admin\UserprofileController@pwdmodifier'));

Route::post('admin/userprofile/pwdmodifier', // post model
	array('as' => 'admin.userprofile.pwdmodifier',
		'middleware' => 'auth',	
		'uses' => 'Admin\UserprofileController@handlepwdmodifier'));

/*********************/
/* Auth et Password  */
/*********************/
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
// Auth
Route::get ('auth/login',  'Auth\AuthController@getLogin');
Route::post('auth/login',  'Auth\AuthController@postLogin');
Route::get ('auth/logout', 'Auth\AuthController@getLogout');
// Password
Route::get ('password/email',        'Auth\PasswordController@getEmail');
Route::post('password/email',        'Auth\PasswordController@postEmail');
Route::get ('password/reset/{one?}', 'Auth\PasswordController@getReset');
Route::post('password/reset',        'Auth\PasswordController@postReset');