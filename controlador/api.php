<?php

namespace Controlador;

require_once 'modelo/api.php';

use Modelo\apiModell;

class ApiControlador {

    private $modelo;

    public function __construct() {
        $this->modelo = new apiModell(); // Inicializa el modelo 
    }

    public function fetchData($apiKey) {
        $movies = $this->modelo->extraer($apiKey);

        foreach ($movies as $movie) {
            // Verificar si la pelicula o serie esta en la base de datos
            $pelicula = apiModell::where('id', $movie['id'])->first();

            // Si la película o serie no existe en la base de datos, la ingresamos
            if (!$pelicula) {
                $pelicula = new apiModell();
                $pelicula->id = $movie['id'];
                $pelicula->title = $movie['title'];
                $pelicula->overview = $movie['overview'];
                $pelicula->poster_path = $movie['poster_path'];
                $pelicula->vote_average = $movie['vote_average'];
                $pelicula->save();
            }

            // Obtener y actualizar el video principal de la película
            $videoKey = $this->modelo->video($movie['id'], $apiKey);
            if ($videoKey !== '') {
                $pelicula->video_principal = $videoKey;
                $pelicula->save();
            }
        }
    }
    public function setModelo($modelo)
{
    $this->modelo = $modelo;
}
}