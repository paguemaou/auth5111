<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request; // ajout lié à la surcharge
use Illuminate\Support\Facades\Password; // ajout lié à la surcharge

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /* ************************
     * SURCHARGE DES TRAITS
    **************************
    */

    /**
     * Path de Redirection après login JCV
     * (voir le trait AuthenticatesAndRegistersUsers)
    */
    protected $redirectPath = '/';  

    /**
     * Get the e-mail subject line to be used for the reset link email.
     *
     * @return string
     */
    protected function getEmailSubject()
    {
        return isset($this->subject) ? $this->subject : 'Demande de changement du mot de passe';
    }

     /**
     * Reset the given user's password.
     * 
     *  JCV AJOUT DU REGEX 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request)
    {
        // JCV Ajout du Regex lors du changement de mot de passe
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password'  => array('required' ,
                             'confirmed',
                             'min:6',
                             'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'), // JCV

        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect($this->redirectPath())->with('status', trans($response));

            default:
                return redirect()->back()
                            ->withInput($request->only('email'))
                            ->withErrors(['email' => trans($response)]);
        }

        
    }
}
