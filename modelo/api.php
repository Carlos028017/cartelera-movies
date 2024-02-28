<?php

namespace Modelo;

use Illuminate\Database\Eloquent\Model;

class apiModell extends Model
{
  protected $table = 'peliculas';

  public function extraer($apiKey)
  {
    // URL de la API de TMDb para obtener las películas populares
    $url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $apiKey;
    //$url = 'https://api.themoviedb.org/3/movie?api_key=' . $apiKey;

    // Realizar la solicitud a la API para obtener las películas populares
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Obtener solo los datos relevantes de las películas
    $movies = [];
    foreach ($data['results'] as $movie) {
      //$movieModel = new apiModell();
      $pelicula = new apiModell();
      $pelicula->id = $movie['id'];
      $pelicula->title = $movie['title'];
      $pelicula->overview = $movie['overview'];
      $pelicula->vote_average = $movie['vote_average'];
      $pelicula->poster_path = 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'];
      $pelicula->save();

      $movies[] = $pelicula;
    }

    return $movies;
  }

  public function video($movieId, $apiKey)
  {
    // URL de la API de TMDb para obtener los videos de una película
    $url = 'https://api.themoviedb.org/3/movie/' . $movieId . '/videos?api_key=' . $apiKey;

    // Realizar la solicitud a la API para obtener los videos de la película
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Obtener la clave del video principal si está disponible
    $videoKey = '';
    if (isset($data['results'][0])) {
      $videoKey = $data['results'][0]['key'];
    }

    return $videoKey;
  }
}