<?php
require_once __DIR__ .'/metricas.php';
require_once __DIR__ .'/vendor/autoload.php';
require_once __DIR__ .'/src/controlador/favoritas.php';
require_once __DIR__.'/src/controlador/api.php';
require_once __DIR__.'/src/repositorio/peliculas.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use controlador\ControllerPeliculas;
use repositorio\peliculasInterface;
use Modelo\Peliculas;
use Modelo\service;
use controlador\ApiControlador;
use repositorio\pelicularepositorio;

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

$apiKey = 'ec84fd2302154d2c26b0d499ac819ce8'; // API key de TMDb

$controlador = new ApiControlador();
if (isset($_POST['fetch_data'])) {
    $controlador->fetchData($apiKey);
    echo "Datos obtenidos y guardados correctamente.";
}

// Crear una instancia concreta de Peliculasrepository que implemente Peliculasrepository
$repositorio = new pelicularepositorio();
// Inyectar el repositorio en el controlador
$controlador = new ControllerPeliculas($repositorio);
// Ejecutar el método index del controlador
$controlador->index();
