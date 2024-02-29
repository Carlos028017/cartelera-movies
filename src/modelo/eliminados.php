<?php
namespace Modelo;

use Illuminate\Database\Eloquent\Model;
class eliminados extends Model{
 
    protected $table = 'registro_de_datos_elimindos';
    protected $filaTable =['idpelicula','title','overview','vote_average','poster_path'];
    public $timestamps = false;
}