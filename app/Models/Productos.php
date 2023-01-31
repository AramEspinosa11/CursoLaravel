<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Llamar al modelo categorias
use App\Models\Categorias;

class Productos extends Model
{
    use HasFactory;

    protected $guarded =[];
    public $timestamps = false;
    protected $table = 'productos';
    
    public function categorias()
    {
        //Claves foraneas, informarle a lavarel sobre la relacion que tienen las tablas
        return $this->belongsTo(Categorias::class);
    }
}
