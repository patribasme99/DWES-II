<?php

    session_start();

    include 'libmenu.php';

    if ($_SESSION['usuario'] == null) {
        header('Location: entrada.php');
    }

    $tipo = '';
    $arrayPlatos = array();

    if (isset($_GET['tipo'])) {
        $tipo = $_GET['tipo'];
        $_SESSION['tipo'] = $tipo;
        $arrayPlatos = damePlatos($tipo);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido plato</title>
</head>
<body>
    <?php
        $tipo = $_GET['tipo'];
        if (array_key_exists($tipo, $_SESSION)) {
            echo '<p>Va a cambiar su elección ' . $_SESSION[$tipo] . ' por:</p>';
        } else {
            echo '<p>Elija un ' . $tipo . '</p>';
        }
    ?>
    <form action="pedido.php" method="post">
        <table>
            <tr>
                <td>
                    <select name="platosPrecio">
                        <?php
                            foreach ($arrayPlatos as $plato => $precio) {
                                echo '<option value="' . $plato . '">' . $plato . ' - ' . $precio . '€</option>';
                            }
                        ?>
                    </select>
                    <button type="submit" name="elegir">ELEGIR <?php echo $tipo; ?></button>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>