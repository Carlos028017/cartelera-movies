<?php
namespace Controlador;

use Modelo\Historialiminados;
use Modelo\Peliculas;
use repositorio\pelicularepositorio;

class crudController
{
    protected $repositorio;

    public function index()
    {
        $peliculas = Peliculas::orderByDesc('id')->get();
        include __DIR__ . '/../Vista/crud.php';
    }

    public function eliminar($id)
    {
        $pelicula = Peliculas::find($id);
        if (!$pelicula) {
            // Película no encontrada, redirigir a la página principal
            header('Location: crud.php');
            exit();
        }
        echo "<script>alert('Pelicula eliminada correctamente');</script>";
        echo "<meta http-equiv='refresh' content='0.00000000000001;url=crud.php'>";

        // los registros eliminados se guardan en la tabal de eliminados 
        /*$peliculaEliminada = new Historialiminados();
        $peliculaEliminada->idpelicula = $pelicula->idpelicula;
        $peliculaEliminada->title = $pelicula->titulo;
        $peliculaEliminada->overview = $pelicula->sinopsis;
        $peliculaEliminada->vote_average = $pelicula->imagen_principal;
        $peliculaEliminada->save();*/

        $pelicula->delete();
    }

    public function crear()
    {
        include __DIR__ . ('/../vista/crud/insertar.php');
    }

    public function insertar()
    {
        $pelicula = new Peliculas();
        $pelicula->id = $_POST['id'];
        $pelicula->title = $_POST['title'];
        $pelicula->overview = $_POST['overview'];
        $pelicula->poster_path = $_POST['poster_path'];
        $pelicula->vote_average = $_POST['vote_average'];
        $pelicula->save();
        header('LOCATION: crud.php');


    }

    public function actualizar()
    {
        $pelicula = Peliculas::find('id')->get();
        include __DIR__ . ('/../vista/crud/editar.php');
    }

    public function editar($id)
    {
        $pelicula = Peliculas::find('id')->get();
        $pelicula->id = $_POST['idpelicula'];
        $pelicula->title = $_POST['title'];
        $pelicula->overview = $_POST['overview'];
        $pelicula->vote_average = $_POST['vote_average'];
        $pelicula->poster_path = $_POST['poster_path'];
        $pelicula->save();
        header('LOCATION: crud.php');
    }
}
