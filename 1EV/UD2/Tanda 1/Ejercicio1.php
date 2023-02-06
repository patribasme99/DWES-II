<?php

    session_start();
    $mensaje = '';

    if (isset($_POST['aniadir'])) {
        if (empty($_POST['nombre'])) {
            $mensaje = 'Debe introducir un nombre';
        } else {
            if (is_numeric($_POST['nombre'])) {
                $mensaje = 'No has escrito el nombre únicamente con letras y espacios';
            } else {
                $nombre = str_split($_POST['nombre']);
                $cont = 0;
                for ($i=0; $i < count($nombre); $i++) { 
                    if (is_numeric($nombre[$i])) {
                        $cont++;
                    }
                }
                if ($cont == 0) {
                    if ($_SESSION['nombres'] == null) {
                        $_SESSION['nombres'] = array($_POST['nombre']);
                    } else {
                        array_push($_SESSION['nombres'], $_POST['nombre']);
                    }     
                } else {
                    $mensaje = 'No has escrito el nombre únicamente con letras y espacios';
                }
            }
        }
    }

    if (isset($_POST['borrar'])) {
        $_SESSION['nombres'] = array();
    }

    if (isset($_GET['cerrar']) && $_GET['cerrar'] == true) {
        unset($_SESSION['nombres']);
        session_destroy();
        session_start();
        $_SESSION['nombres'] = array();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <p style="color: red">
        <?php
            echo $mensaje;
        ?>
    </p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="formulario" style="width: 400px; border: 2px solid #7777ff; background: #e6e6ff; display: flex; flex-direction: row; flex-wrap: wrap; padding: 10px">
            <label for="nombre" style="margin: 10px">Escriba algún nombre: </label><input type="text" name="nombre" style="margin: 10px">
            <div class="botones" style="margin: 10px">
                <button type="submit" name="aniadir">Añadir</button>
                <button type="submit" name="borrar">Borrar</button>
            </div>
        </div>

        <?php

            if (empty($_SESSION['nombres'])) {
                echo '<p>Todavía no se han introducido nombres</p>';
            } else {
                echo '<p>Datos introducidos:</p><ul>';
                $array_nombres = $_SESSION['nombres'];
                for ($i=0; $i < count($array_nombres); $i++) { 
                    echo '<li>' . $array_nombres[$i] . '</li>';
                }
                echo '</ul>';
            }
        ?>

        <a href="?cerrar=true">Cerrar sesión (se perderán los datos almacenados)</a>
    </form>
</body>
</html>