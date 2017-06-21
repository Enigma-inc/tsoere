<?php

namespace App\Http\Controllers\Auth;

use App\Artist;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\ArtistCategory;

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
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

   public function showRegistrationForm()
    {
        $categories=ArtistCategory::orderBy('name','ASC')->get();

        return view('auth.register')->with(['categories'=>$categories]);
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
            'name' => 'required|string|max:255|unique:artists',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'category' => 'required',
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
        
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

//Create a defualt profile for this user
        if($user)
        {
            Artist::create([
                'user_id'=>$user->id,
                'name' => $data['name'],
                'slug'=>str_slug($data['name']),
                'artist_category_id'=>(int)$data['category']
            ]);

        }

        return $user;


    }
}
