<?php

use PHPUnit\Framework\TestCase;
use Controlador\crudController;
use Modelo\Peliculas;
use repositorio\pelicularepositorio;

class Test extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        $this->controller = new crudController(new pelicularepositorio());
    }

    public function testInsertar()
    {
        $pelicula = new Peliculas();
        $pelicula->id = 1;
        $pelicula->title = 'piraña';
        $pelicula->overview = 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas';
        $pelicula->poster_path = 'piraña.jpg';
        $pelicula->vote_average = 8;

        $this->controller->insertar($pelicula);
    }

    public function testEditar()
    {
        $pelicula = new Peliculas();
        $pelicula->id = 1;
        $pelicula->title = 'piraña';
        $pelicula->overview = 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas';
        $pelicula->poster_path = 'piraña.jpg';
        $pelicula->vote_average = 8;

        $this->controller->editar($pelicula);
    }

    public function testEliminar()
    {
        $pelicula = new Peliculas();
        $pelicula->id = 1;
        $pelicula->title = 'piraña';
        $pelicula->overview = 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas';
        $pelicula->poster_path = 'piraña.jpg';
        $pelicula->vote_average = 8;

        $this->controller->eliminar($pelicula->id);
    }
}