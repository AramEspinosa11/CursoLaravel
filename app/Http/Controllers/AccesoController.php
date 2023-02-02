<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserMetadata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\EjemploMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\ResetPassword;

class AccesoController extends Controller
{
    public function acceso_login()
    { 
        return view('acceso.login' );
    }

    public function acceso_login_post(Request $request)
    {
        $request->validate(
            [
                'correo' => 'required|email:rfc,dns',
                'password' => 'required|min:6' 
            ],
            [
                'correo.required'=>'El campo E-Mail está vacío',
                'correo.email'=>'El E-Mail ingresado no es válido',
                'password.required'=>'El campo Password está vacío',
                'password.min'=>'El campo Password debe tener al menos 6 caracteres'
                
            ]
        );
        if (Auth::attempt(['email' => $request->input('correo') , 'password' => $request->input('password') ])) 
        {
            $usuario = UserMetadata::where('users_id', Auth::id())->first();
            session(['users_metadata_id' => $usuario->id]);
            session(['perfil_id' => $usuario->perfil_id]);
            session(['perfil' => $usuario->perfil->nombre]);
            return redirect()->intended('/template');
        }else
        {
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', "Las credenciales indicadas no son válidas");
            return redirect()->route('acceso_login');
        }
    }

    public function acceso_registro()
    {
        
        return view('acceso.registro' );
    }

    public function acceso_registro_post(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|min:6',
                'correo' => 'required|email:rfc,dns|unique:users,email',
                'telefono' => 'required',
                'direccion' => 'required',
                'password' => 'required|min:6|confirmed' 
            ],
            [
                'nombre.required'=>'El campo Nombre está vacío',
                'nombre.min'=>'El campo Nombre debe tener al menos 6 caracteres',
                'correo.required'=>'El campo E-Mail está vacío',
                'correo.email'=>'El E-Mail ingresado no es válido',
                'correo.unique' => 'El E-Mail ya esta registrado',
                'telefono.required'=>'El campo Teléfono está vacío',
                'direccion.required'=>'El campo Dirección está vacío',
                'password.required'=>'El campo Password está vacío',
                'password.min'=>'El campo Password debe tener al menos 6 caracteres',
                'password.required'=>'El campo Password está vacío',
                'password.min'=>'El campo Password debe tener al menos 6 caracteres',
                'password.confirmed'=>'Las contraseñas ingresadas no coiciden',
            ]
        );
        // Creación de registros en cascada
        $user=User::create
         (
            [
            'name' => $request->input('nombre'),
            'email' => $request->input('correo'),
            'password' => Hash::make($request->input('password')),
            'created_at' => date('Y-m-d H:i:s')
            ]
         );
        $userMetadata=UserMetadata::create
        (
            [
                'users_id'=>$user->id,
                'perfil_id' => 2,
                'telefono'=>$request->input('telefono'),
                'direccion'=>$request->input('direccion')
            ]
        );
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', "Se ha creado el registro exitosamente");
        return redirect()->route('acceso_registro');
    }
    public function acceso_salir(Request $request)
    {
        Auth::logout();
        $request->session()->forget('perfil_id'); 
        $request->session()->forget('perfil');
        $request->session()->forget('users_metadata_id');
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Cerraste la sesión exitosamente');
        return redirect()->route('acceso_login');
    }

    public function acceso_recuperar()
    { 
        return view('acceso.recuperar' );
    }

    public function acceso_recuperar_post(Request $request){
        $request->validate(
            [
                'correo' => 'required|email:rfc,dns' 
            ],
            [
                'correo.required'=>'El campo E-Mail está vacío',
                'correo.email'=>'El E-Mail ingresado no es válido',
            ]
        );
        $email=User::where(['email'=>$request->input('correo')])->firstORFail();
        // $status=ResetPassword::select(['select email from reset_password where email = '.$request->input('correo').' and status = 0']);
        if(is_object($email))
        {
                $token = $this->generar_token();
            $url = "http://localhost/Projects/Laravel/ejemplo1/public/acceso/recuperar_password/?token=".$token;
            $html= '<a href='.$url.'>Link</a>';
            $correo=new EjemploMailable($html );
            Mail::to(['email'=>$request->input('correo')])->send($correo);
            
            ResetPassword::create(
                [
                    'user_email'=>$request->input('correo'),
                    'token'=>$token,
                    'fecha'=>date('Y-m-d'),
                    'status'=>1
                ]
            );

            $request->session()->flash('css', 'success');
            $request->session()->flash('mensaje', "Se envió el mail exitosamente");
            return redirect()->route('acceso_recuperar');
            
        }else{
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', "Ese correo no esta registrado");
            return redirect()->route('acceso_recuperar');
        }
        
    }

    public function generar_token(){
        $ran = random_bytes(10);
        $token = bin2hex($ran);
        $token = $token.date("YmdHis");
        return $token;
   }

}
