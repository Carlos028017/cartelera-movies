<?php
require_once 'vendor/autoload.php';
require_once 'controlador/favoritas.php';
require_once 'controlador/crud.php';
require_once 'repositorio/peliculas.php';

use Controlador\crudController;
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

// Crear una instancia concreta de Peliculasrepository que implemente Peliculasrepository
$repositorio = new pelicularepositorio();
// Inyectar el repositorio en el controlador
$controlador = new crudController($repositorio);
// Ejecutar el método index del controlador
$controlador->index();
