<?php

namespace App\Http\Controllers\Auth;

use App\Ad;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

        }catch(\Exception $e){

            $user = User::all()->where('username', $request['username'])->first();

            //if (Hash::check($request['password'], $user->password)) {
            if (password_verify($request['password'], $user->password)) {
                // dd("Passwords match");
                Auth::attempt(array('username' => $user->username, 'password' => $user->password), true);

                Auth::check(); //!!!
                Auth::login($user);
                $this->guard()->login($user);
                $ads = new Ad();
                //return $this->index($ad, $user);
                return view('ad.index', compact('ads', 'user'));

            }else{
                //dd("Passwords do not match");
                return back()->with('error', "Passwords do not match");
            }
        }

        $username = $request['username'];
        $password = Hash::make($request['password']);
//        $isAuth = $request->has('remember') ? true : false;

        //$objUser = $this->userCreate(['username' => $username, 'password' => $password]);
        $objUser = $this->create(['username' => $username, 'password' => $password]);

        if(!$objUser instanceof User){
            return back()->with('error', "Can't create object");
        }
        //if($isAuth){
        $this->guard()->login($objUser);
        //}

        Auth::attempt(array('username' => $objUser->username, 'password' => $objUser->password),true);

        Auth::check(); //!!!
        Auth::login($objUser);
        $this->guard()->login($objUser);
        $ad = new Ad();
        $ads = $ad->getPage();
        //return $this->index($ad, $objUser);
        return view('ad.index', compact('ads', 'objUser'));
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
            'username' => 'required|string|max:25|unique:users',
            'password' => 'required|string|min:1',
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
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
