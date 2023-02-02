<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ResetPassword;
use App\Models\User;

class Recuperar extends Controller
{
    public function acceso_recuperar_token(){
        $token = $_GET['token'];
            return view('acceso.recuperar_password', ['token' => $token]);
    }

    public function acceso_new_password_post(Request $request){
        // $token = $_GET['token'];
        // $email = ResetPassword::select('select user_email from reset_password where token ='.$token);
        // $email_user = User::select('slect email from users where email = '.$email);
        // $array = array($email_user);
        // if(isset($array)){
        //     $datos = Productos::where(['email'=>$email_user])->firstOrFail();
            $request->validate(
                [
                    'password' => 'required|min:6|confirmed' 
                ],
                [
                    'password.required'=>'El campo Password está vacío',
                    'password.min'=>'El campo Password debe tener al menos 6 caracteres',
                    'password.required'=>'El campo Password está vacío',
                    'password.min'=>'El campo Password debe tener al menos 6 caracteres',
                    'password.confirmed'=>'Las contraseñas ingresadas no coiciden',
                ]
            );
        }
    }



