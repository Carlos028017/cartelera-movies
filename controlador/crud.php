<?php

namespace Controlador;

use repositorio\pelicularepositorio;

class crudController
{
    protected $repositorio;

    public function __construct(pelicularepositorio $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function index()
    {
        $peliculas = $this->repositorio->obtenerTodas();
        include __DIR__.('/../vista/crud.php');
    }
}
