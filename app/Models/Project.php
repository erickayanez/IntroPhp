<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Project extends Model{
  protected $table ='projects';
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
    return 'Project Duration:'.$duracion;

  }
}

 ?>
