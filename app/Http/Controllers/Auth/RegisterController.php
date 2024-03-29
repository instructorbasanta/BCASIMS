<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest:customer');
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showCustomerRegisterForm()
    {
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['setting'] = Setting::where('status',1)->first();
        return view('frontend.customer.register',compact('data'));
    }

    protected function createCustomer(Request $request)
    {
//        dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'website' => ['required', 'url', 'max:255'],
            'phone' => ['required', 'integer', 'max:10'],
            'gender' => ['required'],
            'profile_image' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($request->hasfile('profile_image'))
        {
            $filename = time().'.'.$request->file('profile_image')->getClientOriginalExtension();;
            $request->file('profile_image')->move('images/customer', $filename);
            $request->request->add(['image' => $filename]);
        }
        $customer = Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'phone' => $request['phone'],
            'website' => $request['website'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'image' => $request['image'],
            'verification_key' => rand(10000000,99999999),
        ]);
        return redirect()->intended('/customer/login');
    }

}
