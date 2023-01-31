<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h2>Mostramos unas temperaturas</h2>
    <?php
        $temperaturas = [14, 12, 16, 12, 13, 16, 20, 21, 15, 12, 7, 3, 6];
        $media = array_sum($temperaturas) / count($temperaturas);
        $redondeo = round($media);
        $truncado = floor($media);

        for ($i=0; $i < count($temperaturas)-1; $i++) { 
            echo $temperaturas[$i] . " - ";
        }
        echo $temperaturas[count($temperaturas)-1];
    ?>

    <h2>Media redondeada</h2>
    <?php
        echo "<p>" . $redondeo . "</p>";
    ?>

    <h2>Media truncada</h2>
    <?php
        echo "<p>" . $truncado . "</p>";
    ?>

    <h2>Las 5 temperaturas más bajas</h2>
    <?php
        sort($temperaturas);
        for ($i=0; $i < 5; $i++) { 
            echo $temperaturas[$i] . " - ";
        }
        echo $temperaturas[5];
    ?>

    <h2>Las 5 temperaturas más altas</h2>
    <?php
        rsort($temperaturas);
        for ($i=0; $i < 5; $i++) { 
            echo $temperaturas[$i] . " - ";
        }
        echo $temperaturas[5];
    ?>
</body>
</html>