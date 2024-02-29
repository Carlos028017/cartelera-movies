<?php
namespace repositorio;
require_once __DIR__.'../peliculaIntreface.php';
require_once __DIR__.'/../modelo/peliculas.php';

use Modelo\Peliculas;

class pelicularepositorio implements peliculasInterface
{
    public function obtenerTodas(){
        return peliculas::all();
    }
}