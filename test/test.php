<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Modelo\Peliculas;



class Test extends TestCase
{
    protected $controller;
    
    public function testInsertar()
    {
        $pelicula = new Peliculas();
        $pelicula->id = 1;
        $pelicula->title = 'piraña';
        $pelicula->overview = 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas';
        $pelicula->poster_path = 'piraña.jpg';
        $pelicula->vote_average = 8;

        $this->controller->insertar($pelicula);

        $peliculaEncontrada = Peliculas::find($pelicula->id);
        $this->assertSame($pelicula->id, $peliculaEncontrada->id);
        $this->assertSame($pelicula->title, $peliculaEncontrada->title);
        $this->assertSame($pelicula->overview, $peliculaEncontrada->overview);
        $this->assertSame($pelicula->poster_path, $peliculaEncontrada->poster_path);
        $this->assertSame($pelicula->vote_average, $peliculaEncontrada->vote_average);
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

        $peliculaEncontrada = Peliculas::find($pelicula->id);
        $this->assertSame($pelicula->id, $peliculaEncontrada->id);
        $this->assertSame($pelicula->title, $peliculaEncontrada->title);
        $this->assertSame($pelicula->overview, $peliculaEncontrada->overview);
        $this->assertSame($pelicula->poster_path, $peliculaEncontrada->poster_path);
        $this->assertSame($pelicula->vote_average, $peliculaEncontrada->vote_average);
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

        $peliculaEncontrada = Peliculas::find($pelicula->id);
        $this->assertNull($peliculaEncontrada);
    }

}