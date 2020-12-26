<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Account;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
            'phone' => ['required'],
            // 'address' => ['required'],
            // 'date_of_birth' => ['required'],
            // 'city' => ['required'],
            // 'region' => ['required'],
            // 'country' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'phone' => request()->phone,
            'email' => request()->email,
            // 'address' => request()->address,
            // 'date_of_birth' => request()->date_of_birth,
            // 'city' => request()->city,
            // 'region' => request()->region,
            // 'country' => request()->country,
        ]);

        Account::create([
            'user_id' => $user->id,
            'name' => 'wallet',
            'balance' => 0,
            'credit' => 0,
            'limit' => 0,
        ]);

        return $user;
    }
}
