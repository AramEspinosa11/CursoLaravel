<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_inicio(){
        $texto="Hola amigo como estas?";
        $numero = 12;
        $paises=array(
            array(
                "nombre"=>"Chile", "dominio"=>"cl"
            ),
            array(
                "nombre"=>"México", "dominio"=>"mx"
            ),
            array(
                "nombre"=>"Colombia", "dominio"=>"co"
            ),
            array(
                "nombre"=>"Perúe", "dominio"=>"pe"
            )
        );
        //return view('home', ['texto'=>$texto]);
        return view('home', compact('texto', 'numero', 'paises'));
    }
    public function home_hola(){
        echo "Holaaa";
    }
    public function home_parametros($id, $slug){
        echo "id=".$id."  slug=".$slug;
    }
}
