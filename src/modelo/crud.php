<?php
namespace modelo;

use Modelo\Historialiminados;
use Modelo\Peliculas;

class crud 
{
    protected $tabla = 'registro_de_datos_elimindos';

    public function __construct()
    {

    }

    public function eliminar($id)
    {
        $movie = Peliculas::find($id);
        if (!$movie) {
            header('LOCATION: crud.php');
        }
        echo "<script>alert('El registro se eliminara y se guardara en el historial de eliminados')</script>";

        $peliculaEliminada = new Historialiminados();
        $peliculaEliminada->id = $movie->id;
        $peliculaEliminada->title = $movie->title;
        $peliculaEliminada->overview = $movie->overview;
        $peliculaEliminada->vote_average = $movie->vote_average;
        $peliculaEliminada->poster_path = $movie->poster_path;
        $peliculaEliminada->save();
    }

    public function insertar($id)
    {
        // Verificar si la pelicula o serie esta en la base de datos
        $pelicula = Peliculas::find($id)->first();

        // Si la película o serie no existe en la base de datos, la ingresamos
        if (!$pelicula) {
            $pelicula = new Peliculas();
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
}