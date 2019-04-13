<?php

//Inicializacion de errores
ini_set('display_errors',1);
ini_set('display_startup_error',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
session_start(); //inicializa la sesión

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;
$routerContainer = new RouterContainer();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DATABASE'),
    'username'  => getenv('USERNAME'),
    'password'  => getenv('PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map-> get('index','/IntroPhp/', [
  'controller' => 'App\Controllers\IndexController',
  'action' => 'indexAction'
]);
$map-> get('addJob','/IntroPhp/job/add', [
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAcion'
]);
$map-> post('saveJobs','/IntroPhp/job/add', [
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAcion'
]);

$map-> get('addUser','/IntroPhp/user/add', [
  'controller' => 'App\Controllers\UsersController',
  'action' => 'getAddUserAction',
  'auth' => true
]);
$map-> post('saveUser','/IntroPhp/user/add', [
  'controller' => 'App\Controllers\UsersController',
  'action' => 'getAddUserAction'
]);

$map-> get('loginForm','/IntroPhp/login', [
  'controller' => 'App\Controllers\AuthController',
  'action' => 'getLogin'
]);

$map-> post('loginAuth','/IntroPhp/auth', [
  'controller' => 'App\Controllers\AuthController',
  'action' => 'postLogin'
]);

$map-> get('admin','/IntroPhp/admin', [
  'controller' => 'App\Controllers\AdminController',
  'action' => 'getIndex',
  'auth' => true
]);

$map-> get('logout','/IntroPhp/logout', [
  'controller' => 'App\Controllers\AuthController',
  'action' => 'getLogout',
  'auth' => false
]);

// $map-> get('index','/IntroPhp/project/add', [
//   'controller' => 'App\Controllers\IndexController',
//   'action' => 'indexAction'
// ]);
//get([1] Nombre de la Ruta, [2]ruta principal proyecto, [3] que regresamos al hacer match
// $map->get('index', '/IntroPhp/', '../index.php');
// $map->get('addJob', '/IntroPhp/job/add', '../addJob.php');
// $map->get('project', '/IntroPhp/project/add', '../addProject.php');

//var_dump($routerContainer->getMap());
$matcher = $routerContainer->getMatcher();
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$route= $matcher->match($request);
function printElement($job){
  // if($job->getVisible() == false){
  //   return;
  // }
  echo '<li class="work-position">';
  echo '<h5>'.$job->title.'</h5>';
  echo '<p>'.$job->description.'</p>';
  echo '<p>'.$job->getDuracionString().'</p>';
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '                <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '                <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
}
// var_dump($route);
// echo "***";
//var_dump($request->getUri()->getPath());

if(!$route){
   echo 'No hay ruta ';
 }else {
  //require $route->handler;
  $handlerData= $route->handler;

  $needsAuth= $handlerData['auth']??false;
  $sessionUserId= $_SESSION['userId']?? null;
   if($needsAuth && !$sessionUserId){
     // echo "Protected route";
     // die; //palabra reservada
     $controllerName = 'App\Controllers\AuthController';
     $actionName= 'getLogin';
     $_SESSION['mensaje']= 'Ruta protegida debe ingresar su usuario y contraseña';
   }else
   {
  $controllerName = $handlerData['controller'];
  $actionName = $handlerData['action'];
}
  //Instancia una clase con el nombre del contenido de una variable
  $controller = new $controllerName;
  //ejecutar un metodo basado en una cadena
  if(method_exists($controller, $actionName)){
    $response= $controller -> $actionName($request);
    //para leer los headers
    foreach ($response->getHeaders() as $name => $values) {
      foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
      }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
  }
  //var_dump($route->handler);
}


// var_dump($route->handler);
// var_dump($route->path);
