<?php namespace App\Http\Controllers;

use App\Ad;
use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

//use Auth;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AdController extends Controller{

    public function __construct()
    {
       // $this->middleware('auth');

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

Auth::login($user);
//dd(Auth::user()->username);

                $ad = new Ad();
                return $this->index($ad, $user);

            }else{
                //dd("Passwords do not match");
                return back()->with('error', "Passwords do not match");
            }
        }

        $username = $request['username'];
        $password = Hash::make($request['password']);

        $objUser = $this->userCreate(['username' => $username, 'password' => $password]);

        if(!$objUser instanceof User){
            return back()->with('error', "Can't create object");
        }
        $isAuth = true;
        Auth::attempt(array('username' => $objUser->username, 'password' => $objUser->password), $isAuth);
//dd(Auth::attempt(array('username' => $objUser->username, 'password' => $objUser->password), true));



//$token = Str::random(60)
//Auth::logout($objUser);
$remember_token = 'test_remember_token';
$objUser->setRememberToken($remember_token);

Auth::login($objUser);

//Session::put('username', Auth::user()->username);
//dd(Auth::user()->username);

        $ad = new Ad();
        return $this->index($ad, $objUser);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:25|unique:users',
            'password' => 'required|string|min:1',
        ]);
    }

    protected function userCreate(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function index(Ad $ad, User $user)
    {


       $ads = $ad->getPage();

       return view('ad.index', compact('ads', 'user'));

   }

    //public function cart($id, Ad $ad)
    public function cart($id, Ad $ad, User $user)
   {
       $ads = $ad->getById($id);
Auth::login($user);
dd(Auth::user()->username);

       return view('ad.cart', compact('ads', 'user'));
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(User $user)
    {
$remember_token = 'test_remember_token';
$user->setRememberToken($remember_token);

        $ads = Ad::all();


//Auth::user()->username;
Auth::check();
Auth::login($user);
        $ads['authorName'] = Auth::user()->username;
dd(Auth::user()->username);

        return view('ad.create', compact('ads', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    //public function store(Request $request)
    public function store(Request $request, User $user)
    {
        $ads = $request->all();

        if (Auth::check())
        {
            dd(Auth::user()->username);
        }


Auth::login($user);
dd(auth()->user());




$ads['authorName'] = Auth::user()->username;


       $ad =  Ad::create($ads);



        return $this->cart($ad->id, $ad, $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);

        return view('ad.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $adUpdate = $request->all();
        $ad = Ad::find($id);
        $ad->update($adUpdate);

        return redirect('ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
/*    public function destroy($id)
    {
        Ad::find($id)->delete();

        return redirect('ads');
    }*/

    public function destroy($id, User $user)
    {
        Ad::find($id)->delete();

//Auth::check(); //!!!
//Auth::login($user);
//dd(Auth::user()->username);

        $ad = new Ad();

        return $this->index($ad, $user);
    }

}
