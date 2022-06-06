<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create()
    {
        $data = [
            'name' => $_REQUEST['name'],
            'email' => $_REQUEST['email'],
            'password' => $_REQUEST['password'],
        ];

        $user =  UserRepository::create($data);

        if($user){
            return redirect()->route('login');
        } else {
            return redirect()->route('register')->with('error', 'Algum erro aconteceu, tente novamente.');
        }
    }

    public function editProfileUser(int $id)
    {
        $user =  UserRepository::findById($id);

        if (!($user->email == $_REQUEST['email'] && Hash::check($_REQUEST['password'], $user->password))) {
            Session::flash('message', 'Senha atual incorreta, tente novamente!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('profile', ['id' => $user->id]);
        }
        $newPassword = $_REQUEST['password_confirmation'];

        $data = [
            'id'          => $user->id,
            'name'        => $_REQUEST['name'],
            'email'       => $_REQUEST['email']
        ];

        if(!$newPassword == ''){
            $newPassword = $_REQUEST['password_confirmation'];
            $data['password'] = Hash::make($newPassword);
        }

        UserRepository::update($data);

        
        Session::flash('message', 'Perfil atualizado com sucesso!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('profile', ['id' => $user->id]);
    }

    public function deleteProfileUser(int $id)
    {
        $user =  UserRepository::findById($id);

        if (!($user->email == $_REQUEST['email'] && Hash::check($_REQUEST['password'], $user->password))) {
            Session::flash('message', 'Senha incorreta, tente novamente!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('deleteProfile', ['id' => $user->id]);
        }

        UserRepository::delete($user->id);
        return redirect()->route('homePage');
    }
}
