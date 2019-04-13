<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if(empty($_POST)==false){
  //crear una nueva instancia de jobs
  $project= new Project();
  $project -> title= $_POST['title'];
  $project -> description= $_POST['description'];
  $project -> months= $_POST['months'];
  $project -> visible= $_POST['visible'];
  $project -> save();

  echo"<label class='btn btn-success'>Proyecto añadido!</label>";

}

 ?>
<html>
 <head>
   <title>Form: Add a Project</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
     crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">

 </head>
<body>
  <div class="container">
  <form class="form" action="addProject.php" method="post">
    <legend>Añadir un proyecto</legend>
    <div class="control-group">
    <label class="control-label" for="">Titulo</label>
    <div class="controls">
      <input type="text" name="title" value="">
    </div>
    <div class="control-group">
    <label class="control-label">Descripción</label>
      <div class="controls">
        <input type="text" name="description" value="">
      </div>
    </div>
    <div class="control-group">
    <label class="control-label">Meses</label>
      <div class="controls">
        <input type="text" name="months" value="">
      </div>
    </div>

    <div class="control-group">
    <label class="control-label">Visible</label>
      <div class="controls">
        <select name="visible">
          <option value="1" selected>True</option>
          <option value="0">False</option>
        </select>
      </div>
    </div>
    <br>
  <div class="control-group">
    <div class="controls">
      <button type="submit"  class="btn" name="btnAceptar">Guardar</button>
    </div>
  </div>
</fieldset>
  </form>
  </
</body>
</html>
