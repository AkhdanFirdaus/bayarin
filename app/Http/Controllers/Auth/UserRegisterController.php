<?php

namespace App\Http\Controllers\Auth;

use App\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Faker;

class UserRegisterController extends Controller
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
    protected $redirectTo = '/home';

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
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pelanggan',
            'alamat' => 'required|string|max:255|unique:pelanggan',
            'password' => 'required|string|min:6|confirmed',

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
        return Pelanggan::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'alamat' => $data['alamat'],
            'no_kwh' => $data['no_kwh'],
            'tarif_id' => 1,
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showUserRegistrationForm()
    {
        $faker = Faker\Factory::create();
        return view('auth.userregister', compact('faker'));
    }
}
