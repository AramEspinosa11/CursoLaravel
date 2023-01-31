<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EjemploController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Listar datos
    // Prosesar las peticiones en formato GET
    public function index()
    {
        echo "Método Get";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Ejecutar peticiones en formato post
    public function store(Request $request)
    {
        echo "Método Post";
        // Métodos para obtener la información del archivo json
        $json = json_decode(file_get_contents('php://input'), true);
        print_r($json);
        //Obtener un valor 
        echo $json['correo'];

        echo $request->input('nombre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Mostrar registro por su id
    public function show($id)
    {
        echo "Método Get con parametros";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Peticiones de formato put
    public function update(Request $request, $id)
    {
        echo "Método Put  id=".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Borrar datos
    public function destroy($id)
    {
        echo "Método Delete  id=".$id;
    }
}
