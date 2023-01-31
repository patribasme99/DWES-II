<?php

    function mostrarJuegos($nomJuego) {
        $personas = [
            'Rebeca' => ['Genshin Impact', 'Valorant', 'Fortnite'],
            'Patricia' => ['Pokemon Unite', 'Valorant', 'Genshin Impact'],
            'Antonio' => ['League of Legends', 'Pokemon Unite'],
            'Alejandro' => ['GTA', 'Valorant', 'Fortnite'],
            'Sara' => ['Valorant', 'Genshin Impact']
        ];
        $numPersonas = 0;

        foreach ($personas as $persona) {
            for ($j=0; $j < count($persona); $j++) { 
                if (strcmp($persona[$j], $nomJuego) === 0) {
                    $numPersonas++;
                }
            }
        }

        foreach ($personas as $persona => $juegos) {
            $seleccion = array_rand($juegos, 2);
            echo "<p>" . $persona . " prefiere jugar a " . $juegos[$seleccion[0]] . " y a " . $juegos[$seleccion[1]] . "</p>";
        }

        return $numPersonas;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
        echo "<p>Hay " . mostrarJuegos('Valorant') . " personas que tienen Valorant como su juego favorito</p>";
    ?>
</body>
</html>