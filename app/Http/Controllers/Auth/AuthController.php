<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Input;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct() {
        $this->middleware('guest', ['except' => 'processLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function processLogin(Request $request){
        // Validate the info
        // Create the rules

        $rules = array(
            'email'    => 'required|email',
            'password' => 'required'
        );

        //Run the validation rules to verify the input details
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                // echo 'SUCCESS!';
                // echo Auth::user()->user_type;

                //Store the user type in sessions
                $currentUserType = Auth::user()->user_type;
                session(['current_user_type' =>  $currentUserType]);
                // $request->session()->put('current_user_type', Auth::user()->user_type);
                // dd($request->session()->get('current_user_type'));

                if(Auth::user()->user_type=='club'){
                    return Redirect::to('clubhome');
                }else if(Auth::user()->user_type=='swf'){
                    return Redirect::to('swfhome');
                }else if(Auth::user()->user_type=='security'){
                    return Redirect::to('securityhome');
                }else if(Auth::user()->user_type=='fa'){
                    return Redirect::to('fahome');
                }

                //TODO : Save the user details in the session

            } else {

                // Validation not successful, Send back to form
                echo "ds";
                return Redirect::to('login');

            }
        }
    }

    public function processLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }


}
