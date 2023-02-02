<?php

    $precio = 0;

    if (isset($_GET['precio'])) {
        $precio = $precio + doubleval($_GET['precio']);
    }

    if (isset($_POST['aniadir'])) {
        if (!empty($_POST['nombre']) && !empty($_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $precioProducto = $_POST['precio'];

            $file = fopen("articulos.txt", "a");
            fwrite($file, PHP_EOL . $nombre . ";" . $precioProducto);
            fclose($file);
        }
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
    <table>
        <tr>
            <td colspan="3">ELIGE TU PEDIDO</td>
        </tr>
        <?php
            $handle = fopen("articulos.txt", "r");
            while (!feof($handle)) {
                $linea = fgets($handle);
                $datos = explode(";", $linea);
                echo "<tr>
                    <td>" . $datos[0] . "</td>
                    <td>" . $datos[1] . "€</td>
                    <td><a href='?precio=" . (doubleval($datos[1]) + $precio) . "'>Añadir unidad</a></td>
                </tr>";
            }
            fclose($handle);
        ?>
        <tr>
            <td colspan="3">TOTAL: <?php echo $precio; ?>€</td>
        </tr>
    </table>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr><td colspan="3">AÑADE ARTÍCULO</td></tr>
            <tr>
                <td><label>Nombre: </label></td>
                <td><label>Precio: </label></td>
            </tr>
            <tr>
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="precio"></td>
                <td><button type="submit" name="aniadir">Añadir</button></td>
            </tr>
        </table>
    </form>
</body>
</html>