<?php namespace App\Http\Controllers;

use App\Ad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

        }catch(\Exception $e){
            $user = User::all()->where('username', $request['username'])->first();
            if (password_verify($request['password'], $user->password)) {
                Auth::login($user);

                return redirect()->back();
            }else{
                return redirect()->back();
            }
        }

        $username = $request['username'];
        $password = $request['password'];

        $objUser = $this->userCreate(['username' => $username, 'password' => $password]);
        Auth::login($objUser);

        return redirect()->back();
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
    protected function userCreate(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::logout();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ad = new Ad();
        $ads = $ad->getPage();
        $user = (Auth::user()) ? Auth::user() : new User();

        return view('ad.index', compact('ads', 'user'));
   }

    /**
     * @param int $id
     * @param Ad $ad
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        //return $this->cart($ad->id, $ad);
        return redirect()->action('AdController@cart', ['id' =>$ad->id, $ad]);

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

      //  return $this->index();
        return redirect()->action('AdController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Ad::find($id)->delete();

        return redirect('/');
    }

}
