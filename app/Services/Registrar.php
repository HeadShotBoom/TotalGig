<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{

		$name = $data['full_name'];
		$email = $data['reg-email'];
		$pass = $data['reg-password'];
		$business = $data['business'];

		$newData = ['full_name' => $name, 'email' => $email, 'password' => $pass, 'business' => $business ];

		return Validator::make($newData, [
			'full_name' => 'required|max:255',
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

		Mail::send('emails.register', $data, function($message) use ($data){

			$message->to($data['reg-email'], $data['full_name'])->subject('Thanks for Registering');
		});

		return User::create([
			'name' => $data['full_name'],
			'email' => $data['reg-email'],
			'password' => bcrypt($data['reg-password']),
			'business' => $data['business'],
		]);
	}

}
