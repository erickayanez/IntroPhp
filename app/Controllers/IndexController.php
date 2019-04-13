<?php
namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController extends BaseController{
  public function indexAction(){
    //enviar una respuesta
    $jobs = Job::all();
    $projects=Project::all();
    $name= 'Ericka Yánez';
    $limitMonths=2000;

    return $this->renderHTML('index.twig', ['name' =>$name,
  'jobs'=> $jobs]);
  }
}

 ?>
