<?php
require_once __DIR__ .'/metricas.php';
require_once 'vendor/autoload.php';
require_once 'src/controlador/crudController.php';
require_once 'src/modelo/peliculas.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Controlador\crudController;
use Modelo\Peliculas;

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

$controlador = new crudController();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'index';
}

switch ($accion) {
    case 'crear':
        $controlador->crear();
        break;
    case 'insertar':
        $controlador->insertar($_POST);
        break;
    case 'actualizar':
        $controlador->actualizar($_GET['id']);
        break;
    case 'editar':
        $controlador->editar($_GET['id']);
        break;
    case 'eliminar':
        $controlador->eliminar($_GET['id']);
        break;
    default:
        $controlador->index();
        break;
}
