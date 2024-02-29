<?php
namespace modelo;

use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model{
 
    protected $table = 'peliculas';
    protected $filaTable =['idpeliculas','title','overview','vote_average','poster_path'];
    public $timestamps = false;

}