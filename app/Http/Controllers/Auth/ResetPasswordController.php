<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function resetPassword()
    {
        $email_address = $_REQUEST['email'];
        $this->sendEmail($email_address);
        return redirect()->route('login');
    }

    public function sendEmail($email_address)
    {
        $user = UserRepository::findByEmail($email_address);
        $randomPassword = Str::random(8);
        $user->password = $randomPassword;

        UserRepository::update([
            'id'       => $user->id,
            'password' => Hash::make($randomPassword)
        ]);

        Mail::to($email_address)->send(new ResetPassword($user));
    }
}
