<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h2>Mostrar la fecha actual: </h2>
    <?php
        $fechaActual = date('jS F Y, l');
        echo "<p>" . $fechaActual . "</p>";
    ?>

    <h2>Días que faltan para finalizar el año:</h2>
    <?php
        $hoy = date("Y-m-d");
        $diferencia = strtotime("2023-12-31") - strtotime($hoy);
        $diferencia = intval($diferencia/86400);
        echo "<p>" . $diferencia . " días</p>";
    ?>

    <h2>Visualizar una cadena a través de un array de palabras</h2>
    <?php
        $array = ['Esto', 'es', 'una', 'cadena', 'de', 'palabras', 'dentro', 'de', 'un', 'array'];
        $frase = '';
        for ($i=0; $i < count($array)-1; $i++) { 
            $frase = $frase . $array[$i] . ' ';
        }
        $frase = $frase . $array[count($array)-1];
        echo "<p>" . $frase . "</p>";
    ?>

    <h2>Reemplazar Ñ por GN</h2>
    <?php
        $cadenaOriginal = "En España no habitan ñus";
        $nuevaCadena = str_replace('ñ', 'gn', $cadenaOriginal);
        echo "<p>Frase original: " . $cadenaOriginal . "</p>";
        echo "<p>Frase cambiada: " . $nuevaCadena . "</p>";
    ?>

    <h2>Devuelve un array con N números aleatorios entre 2 límites</h2>
    <?php
        function devolverNumeros($n, $lim1, $lim2) {
            $array =[];
            $cont = 1;
            while($cont <= $n) {
                $num = rand($lim1, $lim2);
                array_push($array, $num);
                $cont++;
            }
            return $array;
        }

        $arrayAleatorios = devolverNumeros(5, 20, 75);
        for ($i=0; $i < count($arrayAleatorios)-1; $i++) { 
            echo $arrayAleatorios[$i] . " - ";
        }
        echo $arrayAleatorios[count($arrayAleatorios)-1];
    ?>
</body>
</html>