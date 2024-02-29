<?php

namespace Controlador;

use Modelo\videoPelicula;

class videoControler
{
    private $modelo;

    public function __construct(videoPelicula $modelo)
    {
        $this->modelo = $modelo;
    }

    public function show($id)
    {
        if ($id) {
            $videoUrl = $this->modelo->obtenerVideoUrl($id);
        } else {
            $videoUrl = null;
        }

        include __DIR__ . ('/../vista/video.php');

    }
}