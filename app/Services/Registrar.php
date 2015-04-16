<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{

		$name = $data['full-name'];
		$email = $data['reg-email'];
		$pass = $data['reg-password'];
		$business = $data['business'];

		$newData = ['full-name' => $name, 'email' => $email, 'password' => $pass, 'business' => $business ];

		return Validator::make($newData, [
			'full-name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
			'business' => 'required',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['full-name'],
			'email' => $data['reg-email'],
			'password' => bcrypt($data['reg-password']),
			'business' => $data['business'],
		]);
	}

}
