<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = '/top';

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
            'email' => 'required|string|email|max:255|unique:users',
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
        $user = User::create([
            'area' => $data['area'],
            'number' => $data['number'],
            'password' => bcrypt($data['password']),
            'name' => $data['name'],
            'authority' => $data['authority'],
            'team' => $data['team'],
            'post' => $data['post'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'note' => $data['note'],
            'image' => $data['image'],
        ]);

        $id = $user->id;
        $give_role = $this->giveRole($id);

        return $user;
    }

    //role付与
    public function giveRole($id)
    {
        $user = User::find($id);
        $role = $user->authority;

        switch($role){
            case "マネージャー":
                $user->assignRole('マネージャー');
                break;
            case "サブマネージャー":
                $user->assignRole('サブマネージャー');
                break;
            case "コーディネーター":
                $user->assignRole('コーディネーター');
                break;
            case "アシスタント":
                $user->assignRole('アシスタント');
                break;
            case "スタッフ":
                $user->assignRole('スタッフ');
                break;
        }
    }

   
 }

