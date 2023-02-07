<?php

    session_start();

    if ($_SESSION['usuario'] == null) {
        header('Location: entrada.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
</head>
<body>
    <p><a href="pedidoplato.php?tipo=Primero">PRIMER PLATO</a></p>
    <p><a href="pedidoplato.php?tipo=Segundo">SEGUNDO PLATO</a></p>
    <p><a href="pedidoplato.php?tipo=Postre">POSTRE</a></p>
    <p><a href="pedidoplato.php?tipo=Bebida">BEBIDA</a></p>

    <?php

        if (isset($_POST['elegir'])) {
            $puesto = '';
            $file = fopen("platos.txt", "r");
            while(!feof($file)) {
                $linea = fgets($file);
                $datos = explode(' ', $linea);
                if (strcmp($_POST['platosPrecio'], $datos[0]) === 0) {
                    $puesto = $datos[1];
                }
            }
            fclose($file);
            $_SESSION[$puesto] = $_POST['platosPrecio'];
        }

        if (array_key_exists('Primero', $_SESSION) || array_key_exists('Segundo', $_SESSION) || array_key_exists('Postre', $_SESSION) || array_key_exists('Bebida', $_SESSION)) {
            echo '<h2>SU ELECCIÓN:</h2><ul>';
            foreach ($_SESSION as $key => $value) {
                if (strcmp($key, 'Primero') === 0) {
                    echo '<li>Primer plato: ' . $value . '</li>';
                }
                if (strcmp($key, 'Segundo') === 0) {
                    echo '<li>Segundo plato: ' . $value . '</li>';
                }
                if (strcmp($key, 'Postre') === 0) {
                    echo '<li>Postre: ' . $value . '</li>';
                }
                if (strcmp($key, 'Bebida') === 0) {
                    echo '<li>Bebida: ' . $value . '</li>';
                }
            }
            echo '</ul>';
        }

    ?>
</body>
</html>