<h1> Ejercicios Operadores</h1>
<h2> Ejercicio 1</h2>
<?php
$resultado = 32+3;
$resOp= 3*(2+3);
echo 'Operación 1:  (32+3)=' .$resultado;
echo '<br> Operación 2: 3(2+3)=' .$resOp;

echo "<h2> Ejercicio 2</h2>";
 $valor= '10';
 //$valor es mayor que 5 pero menor que 10
 if($valor >5 && $valor >10){
   echo '<br>Valor ' .$valor .' es menor que 5 y mayor a 10';
 }
//$valor es mayor o igual a 0 pero menor o igual a 20
if($valor >= 0 && $valor<=20){
    echo '<br>Valor ' .$valor .' es mayor igual a 0 pero menor o igual a 20';
}

if($valor ==='10'){
    echo '<br>Valor ' .$valor .' es cadena 10';
}

if(($valor >0 && $valor<5) || ($valor>10 && $valor <15))
{
  echo '<br>Valor ' .$valor .' es mayor a 0 pero menor a 5 o es mayor a 10 pero menor a 15';
}


 ?>
