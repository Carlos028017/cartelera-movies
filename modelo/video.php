<?php

namespace Modelo;

use Illuminate\Database\Eloquent\Model;

class videoPelicula extends Model
{
    protected $table = 'peliculas';
    


    public function obtenerVideoUrl($id)
    {
        $pelicula = videoPelicula::find($id);

        if ($pelicula) {
            return $pelicula->video_principal;
        }

        return null;
    }

    /*public function obtenerVideoSerie($id)
    {
        $this->setTable('series');
        $serie = $this->find($id);

        if ($serie) {
            return $serie->video_principal;
        }

        return null;
    }*/
}