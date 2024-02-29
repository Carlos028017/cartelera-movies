<?php

namespace Controlador;

use Modelo\Historialiminados;
use Modelo\Peliculas;
use repositorio\pelicularepositorio;

class crudController
{
    protected $repositorio;

    protected $table = 'peliculas';

    public function __construct(pelicularepositorio $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function eliminar($id)
    {
        $movie = Peliculas::find($id);
        if (!$movie) {
            header('LOCATION: crud.php');
        }
        echo "<script>alert('El registro se eliminara')</script>";
    }

    public function insertar()
    {
        $pelicula = new Peliculas();
        if ($pelicula) {
            $pelicula->id = $_POST['id'];
            $pelicula->title = $_POST['title'];
            $pelicula->overview = $_POST['overview'];
            $pelicula->poster_path = $_POST['poster_path'];
            $pelicula->vote_average = $_POST['vote_average'];
            $pelicula->save();
        }

    }

    public function editar($id)
    {
        $pelicula = new Peliculas();
        $pelicula->id = $_POST['idpelicula'];
        $pelicula->title = $_POST['title'];
        $pelicula->overview = $_POST['overview'];
        $pelicula->vote_average = $_POST['vote_average'];
        $pelicula->poster_path = $_POST['poster_path'];
        $pelicula->save();

    }


    public function index()
    {
        $peliculas = $this->repositorio->obtenerTodas();
        include __DIR__.('/../vista/crud.php');
    }
}
