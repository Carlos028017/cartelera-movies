<?php
namespace servicio;

use repositorio\peliculasInterface;

class service{
    protected $repositorio;

    public function __construct(peliculasInterface $repositorio){
        $this->repositorio = $repositorio;
    }

    public function obtenerPeliculas(){
        return $this->repositorio->obtenerTodas();
    }
}