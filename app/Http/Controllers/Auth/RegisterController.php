<?php

namespace App\Http\Controllers\Auth;
use DB;
use App\User;
use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use App\SendCode;

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
    protected $redirectTo = '/verify';

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
            'phone' => ['required','min:11','unique:users'],
            'blood_group' => ['required'],
            'gender' => ['required'],
            'weight' => ['required', 'max:2','gte:48'],
            'password' => ['required', 'string', 'min:8'],
            'district' => ['required'],
            'area' => ['required'],
            'email' => [''],
            'address' => [''],
        ]);
    }

    public function register(Request $request){
        $phone = $request->phone;
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request,$user) ?: redirect('/verify?verify-phone='.$request->phone)->with('phone');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->blood_group = $data['blood_group'];
        $user->weight = $data['weight'];
        $user->gender = $data['gender'];
        $user->availability = 1;
        $user->password = Hash::make($data['password']);
        
        if ($user->save()) {
            $user->verification_token = SendCode::sendCode($user->phone);
            $user->save();
        }
        

        $id = $user->id;


        // $user_id = $user_data->id;
        $address = new Address;
        $address->area_id = $data['area'];
        $address->user_id = $id;
        $address->address = $data['address'];
        $address->save();

       // return ($user);

    }
}
