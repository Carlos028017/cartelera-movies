<?php
require_once __DIR__ .'/metricas.php';
require_once 'vendor/autoload.php';
require_once 'src/modelo/video.php';
require_once 'src/controlador/video.php';

use Illuminate\Database\Capsule\Manager as Capsule;

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

$modelo = new \Modelo\videoPelicula();
$controller = new \Controlador\videoControler($modelo);

$id = $_GET['id'];
$videoUrl = $controller->show($id);

?>