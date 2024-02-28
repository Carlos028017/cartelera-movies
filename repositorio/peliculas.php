<?php
namespace repositorio;
require_once 'peliculaIntreface.php';
require_once 'modelo/peliculas.php';

use Modelo\Peliculas;

class pelicularepositorio implements peliculasInterface
{
    public function obtenerTodas(){
        return peliculas::all();
    }
}