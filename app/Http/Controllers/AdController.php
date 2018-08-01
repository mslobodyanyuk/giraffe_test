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
use Illuminate\Support\Str;


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


//echo "<pre>request['password'] = ", var_dump($request['password']) ,"</pre>";
//echo "<pre>user->password = ", var_dump($user->password) ,"</pre>";

            if (password_verify($request['password'], $user->password)) {
                 //dd("Passwords match"); // Завести нового пользователя так, чтоб проходил проверку совпадения пароля

    Auth::login($user);




                $ad = new Ad();
                return $this->index($ad, $user);

            }else{
                dd("Passwords do not match");
               // return back()->with('error', "Passwords do not match");
            }
        }


        $username = $request['username'];
        $password = $request['password'];



        $objUser = $this->userCreate(['username' => $username, 'password' => $password]);


        $isAuth = true;
        if (Auth::attempt(array('username' => $objUser->username, 'password' => $objUser->password), $isAuth)) {

        }


Auth::logout($objUser);
Auth::login($objUser);



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

        $user = new User();

        if( Auth::user()){
            $user = Auth::user();
        }

       return view('ad.index', compact('ads', 'user'));

   }


    public function cart($id, Ad $ad)
   {
       $ads = $ad->getById($id);
       $user = Auth::user();
       return view('ad.cart', compact('ads', 'user'));
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $ads = Ad::all();

        return view('ad.create', compact('ads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $ads = $request->all();

        $ads['authorName'] = Auth::user()->username;
        $ads['user_id'] = Auth::user()->id;

        $ad =  Ad::create($ads);

        return $this->cart($ad->id, $ad);
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

    public function logout() {
        Auth::logout();

        $ad = new Ad();
        $user = new User();

        return $this->index($ad, $user);
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


        $user =  Auth::user();


        return $this->index($ad, $user);
        //return back();
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

    public function destroy($id)
    {
//dd('!!!');

        Ad::find($id)->delete();

        $ad = new Ad();
        $user = Auth::user();

        return $this->index($ad, $user);
        //return back();
    }

}
