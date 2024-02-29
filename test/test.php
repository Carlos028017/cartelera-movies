<?php
namespace Test;

use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase;
use Modelo\Peliculas;
use Controlador\crudController;



class Test extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'movie',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

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
        $pelicula->save();

        $controller = new crudController();
        $this->$controller->eliminar($pelicula->id);

        $this->assertNull(Peliculas::find($pelicula->id));
    }

}