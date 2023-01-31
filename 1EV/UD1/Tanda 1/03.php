<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <ol>
        <?php
            $ciudades = ['Barcelona', 'Barcelona', 'Madrid', 'Bilbao', 'Vitoria', 'Bilbao', 'Zaragoza', 'Teruel', 'Sevilla', 'Vitoria'];
            $noRepetidos = array_unique($ciudades);
            for ($i=0; $i < count($noRepetidos); $i++) {
                if (!empty($noRepetidos[$i])) {
                    echo "<li>" . $noRepetidos[$i] . "</li>";
                }               
            }
        ?>
    </ol>
</body>
</html>