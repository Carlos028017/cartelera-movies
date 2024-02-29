<?php
namespace Modelo;

use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model{
 
    protected $table = 'peliculas';
    protected $filaTable =['title','overview','vote_average','poster_path'];
    public $timestamps = false;

}