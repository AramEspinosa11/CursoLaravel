<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\ProductosFotos;
use Illuminate\Support\Str;

class ApiProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Productos::orderBy('id', 'desc')->get();
        return response()->json( $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //POST
    public function store(Request $request)
    {
        $json = json_decode(file_get_contents('php://input') , true);
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
        
        Productos::create(
            [
                'nombre'=>$request->input('nombre'),
                'slug'=>Str::slug($request->input('nombre'), '-'),
                'descripcion'=>$request->input('descripcion'), 
                'precio'=>$request->input('precio'), 
                'stock'=>$request->input('stock'),
                'categorias_id'=>$request->input('categorias_id'),
                'fecha'=>date('Y-m-d')
            ]
            );
        $array=array
                    (
                        'estado'=>'ok',
                        'mensaje'=>'Se creó el registro exitosamente', 
                    ); 
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
        $datos=Productos::where(['id'=>$id])->firstORFail();
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
    //PUT
    public function update(Request $request, $id)
    {
        $datos=Productos::where(['id'=>$id])->first();
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
        $datos->nombre=$json['nombre'];
        $datos->slug=Str::slug($json['nombre'], '-');
        $datos->precio=$json['precio'];
        $datos->descripcion=$json['descripcion'];
        $datos->stock=$json['stock'];
        $datos->save();
        //retorno un json
        $array=array
                    (
                        'estado'=>'ok',
                        'mensaje'=>'Se modificó el registro', 
                    ); 
        return response()->json( $array, 201);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos=Productos::where(['id'=>$id])->firstOrFail();
        $existe = ProductosFotos::where(['productos_id'=>$id])->count();
        if($existe==0)
        {
            Productos::where(['id'=>$id])->delete();
            $array=array
                        (
                            'estado'=>'ok',
                            'mensaje'=>'Se eliminó el registro', 
                        ); 
            return response()->json( $array, 201);
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
