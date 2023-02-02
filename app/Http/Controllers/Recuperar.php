<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ResetPassword;
use App\Models\User;

class Recuperar extends Controller
{
    public function acceso_recuperar_token(Request $request){
        $token =$request->token;
        $user_email =$request->user_email;
        $validar = ResetPassword::where(['token'=>$token])->firstOrFail();
        $validar2 = ResetPassword::where(['user_email'=>$user_email])->firstOrFail();

        if($validar->token==$token && $validar2->user_email==$user_email){
            $request->session()->flash('css', 'success');
            $request->session()->flash('mensaje', "Token valido");
            
        }else{
            $request->session()->flash('css', 'success');
            $request->session()->flash('mensaje', "Token invalido");
            return redirect()->route('acceso_login');
        }
        
        return view('acceso.recuperar_password', compact('token', 'user_email'));
    }

    public function acceso_new_password_post(Request $request){
        $datos= User::where(['email'=>$request->input('user_email')])->firstOrFail();

        if($datos){
            $datos->password =Hash::make($request->input('password'));
            $datos->save();
            $request->session()->flash('css', 'success');
            $request->session()->flash('mensaje', "Se cambio la contraseña exitosamente");
            return redirect()->route('acceso_login');
        }
        // $email = ResetPassword::select('select user_email from reset_password where token ='.$token);
        // $id = User::select('select id from users where email ='.$user_email);

        // // $array = array($email_user);
        // if($id){
        // $datos = User::where(['email'=>$user_email])->firstOrFail();
        //     $request->validate(
        //         [
        //             'password' => 'required|min:6|confirmed' 
        //         ],
        //         [
        //             'password.required'=>'El campo Password está vacío',
        //             'password.min'=>'El campo Password debe tener al menos 6 caracteres',
        //             'password.required'=>'El campo Password está vacío',
        //             'password.min'=>'El campo Password debe tener al menos 6 caracteres',
        //             'password.confirmed'=>'Las contraseñas ingresadas no coiciden',
        //         ]
        //     );
        //     $datos->password=Hash::make($request->input('password'));
        //     $datos->save();
        //     $request->session()->flash('css', 'success');
        //     $request->session()->flash('mensaje', "Se cambio la contraseña exitosamente");
        //     return redirect()->route('acceso_login');
        // }
    }



}