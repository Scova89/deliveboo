<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required','unique:users', 'digits_between:8,15', 'numeric'],
            'iva' => ['required','unique:users', 'digits:11', 'numeric'],
            'image' => ['nullable','mimes:jpeg,bmp,png,jpg','max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $newUser = new User();
        $newUser->name = $data['name'];
        $newUser->email = $data['email'];
        $newUser->password = Hash::make($data['password']);
        $newUser->address = $data['address'];
        $newUser->phone = $data['phone'];
        $newUser->iva = $data['iva'];
        $newUser->slug = $this->getSlug($data['name']);
        if (isset($data['image'])) {
            $path_image = Storage::put('uploads', $data['image']);
            $newUser->image = $path_image;
        }
        
        $newUser->save();
        

        return $newUser;
    }


    /**
     * getSlug
     *
     * @param  mixed $title
     * @return void
     */
    protected function getSlug($name)
    {
        $slug = Str::of($name)->slug("-");
        $count = 1;
        while (User::where("slug", $slug)->first()) {
            $slug = Str::of($name)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
