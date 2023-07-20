<?php

namespace App\Controllers;

use App\Models\User;
use Carbon\Carbon;


class AuthController
{

    public function index()
    {
        return view('auth.login');
    }

    // Authenticate user  
    public function login() {
        
        $inputData = $_POST;

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $errors = validate($inputData, $rules);

        if (!empty($errors)) {
            back($errors);
        } else {
            $email  = $_POST['email'];
            $password = $_POST['password'];
            $userObj = new User();

            $userObj->email = $email; 
            $userObj->password = $password;
            
            if($userObj->login()){
                $_SESSION['user_id'] = $userObj->id;
                $_SESSION['user_name'] = $userObj->name;                
                redirect('dashboard');
                exit();
            }else{
                $errors  = ['Invalid credentials provided!'];
                back($errors);
            }
        }
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        redirect('/login');
        exit();
    }
}