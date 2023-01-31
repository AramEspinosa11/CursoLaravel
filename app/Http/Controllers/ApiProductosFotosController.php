<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductosFotos;
use App\Models\Productos;
use Illuminate\Support\Str;

class ApiProductosFotosController extends Controller
{
    public function __construct()
    {
        #$this->middleware('auth.basic'); 
        $this->middleware('verificacion');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = ProductosFotos::orderBy('id', 'desc')->get();
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
        if(empty($_FILES["foto"]["tmp_name"]))
        {
            $array=
		        	array
		        	(
		        		'response'=>array
			        	(
			        		'estado'=>'Conflict',
			        		'mensaje'=>'La foto es obligatoria' 
			        	)
		        	)
		        ;  	
		    return response()->json($array, 200);
        }
        if($_FILES["foto"]["type"]=='image/jpeg' or $_FILES["foto"]["type"]=='image/png')
        {
            
            switch($_FILES["foto"]["type"])
            {
                case 'image/jpeg':
                    $archivo =time().".jpg";
                break;
                case 'image/png':
                    $archivo =time().".png";
                break;
            }
            //cp
            copy($_FILES["foto"]["tmp_name"], env('RUTA')."/uploads/productos/".$archivo);
        }else
        {
            $array=
		        	array
		        	(
		        		'response'=>array
			        	(
			        		'estado'=>'Conflict',
			        		'mensaje'=>'La foto es no tiene formato válido' 
			        	)
		        	);  	
		    return response()->json($array, 200);
        }
        ProductosFotos::create(
            [ 
                'nombre'=>$archivo,
                'productos_id'=>$request->input('productos_id'),
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
        $datos=ProductosFotos::where(['id'=>$id])->first();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos=ProductosFotos::where(['id'=>$id])->firstOrFail();
        unlink(env('RUTA')."/uploads/productos/".$datos->nombre);
        //unlink();
        ProductosFotos::where(['id'=>$id])->delete();
        $array=array
                        (
                            'estado'=>'ok',
                            'mensaje'=>'Se eliminó la foto', 
                        ); 
        return response()->json( $array, 200);
        
    }
}
