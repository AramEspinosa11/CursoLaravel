<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProtegidaController extends Controller
{
    // proteger la ruta validando que la sesion exista
    public function __construct()
    {
        $this->middleware('acceso');
    }

    public function protegida_inicio(){
        if(session('perfil_id')!=1)
        {
            return redirect()->route('protegida_sin_acceso');
        }
        return view('protegida.home');
    }

    public function protegida_otra(){
        return view('protegida.otra');
    }
    
    public function protegida_sin_acceso()
    {
        return view('protegida.sin_acceso' );
    }
}
