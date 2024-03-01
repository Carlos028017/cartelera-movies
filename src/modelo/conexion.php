<?php
require_once 'vendor/autoload.php';
//use illuminate\database\Capsule\Manager as Capsule; 
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class conexion extends Illuminate\Database\Eloquent\Model{

    public function obtenerConexion(){
        try {
            $capsule = new Capsule;
            $capsule->addConnection([
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'movie',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]);
            $apikey = 'ec84fd2302154d2c26b0d499ac819ce8';
            if (isset($_POST['fetch_data'])) {
            }
            // Establece el despachador de eventos utilizado por los modelos Eloquent... (opcional)
            $capsule->setEventDispatcher(new Dispatcher(new Container));
            // Hacer que esta instancia de Capsule esté disponible globalmente mediante métodos estáticos... (opcional) 
            $capsule->setAsGlobal();
            // Configura el ORM de Eloquent... (opcional; a menos que hayas usado setEventDispatcher()) 
            $capsule->bootEloquent();
            //$films = Capsule::table('peliculas')->get();
            //var_dump($films->toArray());
        } catch (Exception $ex) {
            echo "ERROR:" . $ex->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



}


