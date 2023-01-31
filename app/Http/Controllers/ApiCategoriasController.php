<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categorias;
use App\Models\Productos;
use Illuminate\Support\Str; 

class ApiCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //GET
    public function index()
    {
        // Consulta al modelo categorias ordenado de madera descendente por su id
        $datos = Categorias::orderBy('id', 'desc')->get();
        // Retorna un json con la consulta de la variable datos y como segundo parámetro se pone el estado
        return response()->json($datos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //recibir el json
       //echo file_get_contents('php://input');exit;
       $json = json_decode(file_get_contents('php://input') , true);
       //print_r($json);
       //validar que viene un json
        if(!is_array($json ))
        {
       		$array=
		        	array
		        	(
		        		'response'=>array
			        	(
			        		'estado'=>'Bad Request',
			        		'mensaje'=>'La peticion HTTP no trae datos para procesar ' 
			        	)
		        	)
		        ;  	
		    return response()->json($array, 400);
        }
       //Crear el registro de la categoria
        Categorias::create(
            [
                'nombre'=>$json['nombre'],
                'slug'=>Str::slug($json['nombre'], '-')
            ]
        );
       //Retornar un json
       $array=array
                    (
                        'estado'=>'ok',
                        'mensaje'=>'Se agragó el registro exitosamente', 
                    );
        //Retorna el mensaje de agregado y el estado 201 
        return response()->json( $array, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos=Categorias::where(['id'=>$id])->firstOrFail();
        if(!is_object($datos))
        {
            $array=array
                (
                    'estado'=>'error',
                    'mensaje'=>'No existe el registro', 
                ); 
            return response()->json( $array, 404);
        }else
        {
            return response()->json( $datos, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // PUT
    public function update(Request $request, $id)
    {
        $json = json_decode(file_get_contents('php://input'), true);
        if(!is_array($json ))
            {
                $array=
                        array
                        (
                            'response'=>array
                            (
                                'estado'=>'Bad Request',
                                'mensaje'=>'La peticion HTTP no trae datos para procesar ' 
                            )
                        )
                    ;  	
                return response()->json($array, 400);
            }
        //ejecuto el update

        $datos=Categorias::where(['id'=>$id])->firstOrFail();
        $datos->nombre=$request->input("nombre");
        $datos->slug=Str::slug($request->input("nombre"));
        $datos->save();
        //retorno un json
        $array=array
                    (
                        'estado'=>'ok',
                        'mensaje'=>'Se actualizo el registro exitosamente', 
                    ); 
        return response()->json( $array, 200);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy($id)
    {
        $datos=Categorias::where(['id'=>$id])->firstOrFail();
        $existe = Productos::where(['categorias_id'=>$id])->count();
        if($existe==0)
        {
            Categorias::where(['id'=>$id])->delete();
            $array=array
                        (
                            'estado'=>'ok',
                            'mensaje'=>'Se eliminó el registro', 
                        ); 
            return response()->json( $array, 200);
        }else
        { 
            $array=array
                        (
                            'estado'=>'Bad Request',
                            'mensaje'=>'No se puede eliminar el registro', 
                        ); 
            return response()->json( $array, 400);
        }
    }
}
