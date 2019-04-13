<?php
namespace App\Models;

require_once 'Printable.php';

class BaseElement implements Printable{
 private $title;
 private $description;
 protected $months;
 private $visible= true;

 //constructor
 public function __construct($tit,$desc){
   $this->setTitle($tit);
   $this->description=$desc;
 }


//getters
 public function getTitle(){
   return $this->title;
 }
 public function getDescription(){
   return $this->description;
 }
 public function getMonths(){
   return $this->months;
 }
 public function getVisible(){
   return $this->visible;
 }
//Setters
 public function setTitle($tit){
   if($tit=='')
   {
     $this->title ='N/A';
   }else{
     $this->title= $tit;
   }
 }
 public function setDescription($desc){
    $this->description= $desc;
 }
 public function setMonths($months){
   $this->months= $months;
 }
 public function setVisible($visib){
    $this->visible=$visib;
 }

 public function getDuracionString(){
   //Funcion que indica cuantos años y cuantos meses
   $years= floor($this->months/12);
   $extramonths= $this->months%12;
   $duracion='';
   $concat=false;
   if($years>0){
     $duracion= "$years years";
     $concat=true;
   }
   if($extramonths>0)
   {
     if ($concat) $duracion.=' and ';
     $duracion.= "$extramonths months";
   }
   return $duracion;

 }

 public function getDescripcion(){
   return $this->description;
 }
}

 ?>
