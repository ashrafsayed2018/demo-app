<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
    protected $redirectTo = 'profile/create';

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
        // dd($data);

        $message = array(
            'register_username.required' => 'اسم المستخدم مطلوب',
            'register_username.unique'   => 'اسم المستخدم موجود بالفعل',
            'register_email.unique'   => 'البريد الالكتروني موجود بالفعل',
            'register_password:required' => 'الرقم السري مطلوب ',
            "type.required"  => "نوع الحساب مطلوب",
            'register_password.confirmed'   => 'الرقم السري غير متطابق',
            'register_password.min'   => 'الرقم السري  يجب ان يكون على الاقل 8 احرف',
        );
        return Validator::make($data, [
            'register_username' => ['required', 'string','unique:users','max:255'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type'  => 'required',
            'register_password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $message);

    }

    public function slug($string, $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {



       return  User::create([
            'username' => $data['regsiter_username'],
            'slug'     => $this->slug($data['regsiter_username']),
            'email' => $data['regsiter_email'],
            'type'  => $data['type'],
            'password' => Hash::make($data['register_password']),
        ]);




    }
}
