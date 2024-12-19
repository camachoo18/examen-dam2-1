<?php
// Genera un número aleatorio entre 1 y 100
$randomNumber = rand(1, 100);

// Determina si el número es par o impar
$paridad = ($randomNumber % 2 == 0) ? 'par' : 'impar';

// Crea un array con al menos 5 elementos
$elementos = ['sushi', 'ramen', 'chocolate Milka', 'tulipanes', 'black baccara'];

// Selecciona un elemento aleatorio del array
$elementoAleatorio = $elementos[array_rand($elementos)];

// Crea un array asociativo con los resultados
$response = [
    'numero' => $randomNumber,
    'mensaje' => "El numero $randomNumber es $paridad.",
    'elemento' => $elementoAleatorio
];


// Devuelve el resultado en formato JSON
echo json_encode($response);
?>