<?php

namespace Controlador;

use repositorio\pelicularepositorio;

class ControllerPeliculas
{
    protected $repositorio;

    public function __construct(pelicularepositorio $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function index()
    {
        $peliculas = $this->repositorio->obtenerTodas();
        include __DIR__.('/..//vista/peliculas.php');
    }
}
