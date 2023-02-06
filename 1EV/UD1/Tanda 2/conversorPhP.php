<?php

    $mensajeError = "";
    $resultado = 0;

    if (isset($_POST['convertir'])) {
        
        if (empty($_POST['cantidad'])) {
            $mensajeError = '¡VACIO!';
        } else {
            
            if (!is_numeric($_POST['cantidad'])) {
                $mensajeError = '¡NO NUMERICO!';
            } else {
                
                $tipo = $_POST['tipo'];

                if ($tipo == '0') {
                    $resultado = 1.08 * doubleval($_POST['cantidad']);
                } else {
                    $resultado = 0.93 * doubleval($_POST['cantidad']);
                }

            }

        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>
                    <label>Cantidad:</label>
                    <input type="text" name="cantidad">
                    <p>
                        <?php
                            if (isset($_POST['convertir'])) {
                                echo $mensajeError;
                            }
                        ?>
                    </p>
                </td>
                <td>
                    <input type="radio" name="tipo" value="0"checked>Euros a dólares
                    <input type="radio" name="tipo" value="1">Dólares a euros
                </td>
            </tr>
        </table>
        <p>
            <?php
                if (isset($_POST['convertir'])) {
                    echo $resultado;
                }
            ?>
        </p>
        <button type="submit" name="convertir">CONVERTIR</button>
    </form>
</body>
</html>