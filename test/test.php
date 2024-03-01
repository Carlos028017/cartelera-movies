<?php

namespace Test;

use Illuminate\Database\Capsule\Manager as Capsule;
use Modelo\eliminados;
use PHPUnit\Framework\TestCase;
use modelo\Peliculas;
use controlador\crudController;

class test extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'movie',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function testInsertar()
    {
        $datos = [
            'idpeliculas' => '20',
            'title' => 'piraña',
            'overview' => 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas',
            'poster_path' => 'piraña.jpg',
            'vote_average' => '8'
        ];

        $controller = new crudController();
        $controller->insertar($datos);

        $peliculaEncontrada = Peliculas::where('title', 'piraña')->first();
        $this->assertEquals('piraña', $peliculaEncontrada->title);
        $this->assertEquals('mientras unos jovenes se divertian en la playa fueron atacados por pirañas', $peliculaEncontrada->overview);
        $this->assertEquals('piraña.jpg', $peliculaEncontrada->poster_path);
        $this->assertEquals('8', $peliculaEncontrada->vote_average);
    }

    /*public function testEliminar()
    {
        $pelicula = new Peliculas();
        $pelicula->id = 20;
        $pelicula->title = 'piraña';
        $pelicula->overview = 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas';
        $pelicula->poster_path = 'piraña.jpg';
        $pelicula->vote_average = 8;
        $pelicula->save();

        $peliculaEliminada = new eliminados();
        $peliculaEliminada->ideliminado = $pelicula->idpeliculas;
        $peliculaEliminada->title = $pelicula->title;
        $peliculaEliminada->overview = $pelicula->overview;
        $peliculaEliminada->vote_average = $pelicula->vote_average;
        $peliculaEliminada->poster_path = $pelicula->poster_path;
        $peliculaEliminada->save();

        $controller = new crudController();
        $controller->eliminar($pelicula->id);

        $this->assertNull(Peliculas::find($pelicula->id));
    }*/

    public function testEliminar()
{
    // Crear película
    $pelicula = new Peliculas();
    $pelicula->id = 20;
    $pelicula->idpeliculas = 20;
    $pelicula->title = 'piraña';
    $pelicula->overview = 'mientras unos jovenes se divertian en la playa fueron atacados por pirañas';
    $pelicula->poster_path = 'piraña.jpg';
    $pelicula->vote_average = 8;
    $pelicula->save();

    // Eliminar película
    $controller = new crudController();
    $controller->eliminar($pelicula->id);

    // Verificar que la película fue eliminada
    $this->assertNull(Peliculas::find($pelicula->id));

    // Crear película eliminada
    $peliculaEliminada = new eliminados();
    $peliculaEliminada->ideliminado = $pelicula->idpeliculas;
    $peliculaEliminada->title = $pelicula->title;
    $peliculaEliminada->overview = $pelicula->overview;
    $peliculaEliminada->vote_average = $pelicula->vote_average;
    $peliculaEliminada->poster_path = $pelicula->poster_path;
    $peliculaEliminada->save();

    // Verificar que la película eliminada fue creada
    $this->assertNotNull(eliminados::find($peliculaEliminada->ideliminado));
}
}
