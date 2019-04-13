<?php

// require 'app/Models/Job.php';
// require 'app/Models/Project.php';
// require_once 'app/Models/Printable.php';
// require 'lib1/Project.php';
use App\Models\{Job, Project, Printable};
use Lib1\Project as Lib1Project;

$jobs = Job::all(); // métodos de accesoo
//arreglo de objetos
// $jobs = [
//   $job1,
//   $job2,
//   $job3
// ];


$projects=Project::all();
// $projectLib= new Lib1Project();

//
// $jobs =[
//   [
// 'title'=>'Php Developer',
// 'description'=> 'This is an awesome job',
// 'visible'=> true,
// 'months' =>4
// ],
//   [
//   'title'=>'Python Dev',
//   'visible'=> true,
//   'months' =>3
// ],
// [
//   'title'=>'Devops',
//   'visible'=> false,
//   'months' =>2
// ],
// [
//   'title'=>'Node Dev',
//   'visible'=> true,
//   'months' =>7
// ],
// [
//   'title'=>'Java Developer',
//   'visible'=> true,
//   'months' =>36
// ]
// ];
