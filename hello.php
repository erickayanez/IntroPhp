<?php
//echo "Hello Php World I´m here (again)!";
/*
Escribe el código necesario para generar la cadena final usando el arreglo dado

$arreglo = [

	‘keyStr1’ => ‘lado’,
	0 => ‘ledo’,

	‘keyStr2’ => ‘lido’,
	1 => ‘lodo’,
	2 => ‘ludo’

];

Lado, ledo, lido, lodo, ludo,
decirlo al revés lo dudo.
Ludo, lodo, lido, ledo, lado,
¡Qué trabajo me ha costado!
*/
$var1  = 1;
$name= 'Ericka Yanez';
//var_dump($jobs[0]);
echo "<h1>Ejercicio 1 </h1>";
$arreglo = [
	'keyStr1' => 'lado',
	0 => 'ledo',
	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'

];

foreach ($arreglo as $nombre => $valor) {
  echo $valor.",";
  //echo "reves[$longitud]= $valor";
}
  echo "<br> decirlo al revés lo dudo.<br>";


  foreach (array_reverse($arreglo) as $element) {
  	echo"$element, ";
  }
  echo "<br>¡Que trabajo me ha costado!";
echo "<h1>Ejercicio 2 </h1>";

$arrPaisCiudad=[
  'Ecuador' => [
    'Guayaquil', 'Quito', 'Cuenca'
  ],
  'Mexico' => [
      'Monterrey', 'Queretaro', 'Guadalajara'
    ],
    'Colombia' => [
      'Bogota', 'Cartagena', 'Medellin'
    ],
    'Peru' => [
      'Lima', 'Arequipa', 'Cuzco'
    ],
    'Argentina' => [
      'Buenos Aires', 'Rosario', 'Mar de Plata'
    ]
];


foreach ($arrPaisCiudad as $pais => $ciudades) {
  echo "<br> Pais <b>$pais</b> tiene las ciudades:";
  foreach ($ciudades as $nombre){
    echo "<br> - $nombre";
  }
}

echo "<h1>Ejercicio 3 </h1>";
$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
sort($valores); // Acomoda el arrego de menor a mayor
echo " <br> Los tres valores mas bajos son: ";
for ($i=0; $i < 3; $i++) {
	echo "$valores[$i] ";
}

echo "<br>Los tres valores mas altos son: ";
$tam = count($valores); // Manda el tamaño del arreglo
for ($i=($tam-1); $i >=($tam -3); $i--) {
	echo " ".$valores[$i];
}

echo "<h1>Ejercicio 3 - Solución 2</h1>";
// Numeros más grandes
$times = 3;
echo'Valores más grandes <br>';
while ($times > 0) {
    echo max($valores). '<br>';
    $max_value_key = array_search(max($valores), $valores);
    unset($valores[$max_value_key]);
    $times--;
}

// Numeros más bajos
$times = 3;
echo'Números más bajos <br>';
while ($times > 0) {
    echo min($valores). '<br>';
    $max_value_key = array_search(min($valores), $valores);
    unset($valores[$max_value_key]);
    $times--;
}
echo "<h1>Ejercicio 3 - Solución 3</h1>";
function getValues($type, $times, $array_values)
{
    echo ucfirst($type).' numbers: <br>';
    while ($times > 0) {
    echo $type($array_values). '<br>';
    $max_value_key = array_search($type($array_values), $array_values);
    unset($array_values[$max_value_key]);
    $times--;
    }
}

$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
echo getValues('max',3,$valores);
echo getValues('min',3,$valores);
   ?>
