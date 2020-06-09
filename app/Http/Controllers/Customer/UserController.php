<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('Customer.User.login');
    }

    public function checkUser(UserRequestForm $request)
    {
        $email = $request->get('email');
        $password = md5($request->get('password'));
        $user = User::where('email', $email)->where('password', $password)->get();
        $userArray = "";
        foreach ($user as $key) {
            $userArray = array(
                'id' => $key['id'],
                'name' => $key['name'],
                'email' => $key['email'],
                'role' => $key['role']
            );
        }
        if ($userArray) {
            Session::put('user', $userArray);
            if ($userArray['role'] != 'admin')

                return redirect('/');
            else
                return redirect('/admin/home');

        } else {

            return redirect('/customer/login')->with('status', "{{ __('Sai email hoặc password!!!') }}");
        }
    }

    public function logout(Request $request)
    {
        Session::forget('user');

        return redirect('/');
    }

    public function create()
    {
        return view('Customer.User.register');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = md5($request->get('pass'));
        $user->save();

        return redirect('/customer/login')->with('mess', 'REGISTER SUCCESS!!!');
    }
}

