<?php

    session_start();

    $productoPrecio = [
        'Prod1' => 10,
        'Prod2' => 20,
        'Prod3' => 10,
        'Prod4' => 30
    ];

    if (!isset($_POST['aniadir']) && !isset($_POST['formalizar']) && !isset($_POST['vaciar'])) {    
        $_SESSION['carro'] = [
            'Prod1' => 0,
            'Prod2' => 0,
            'Prod3' => 0,
            'Prod4' => 0
        ];
    }


    if (isset($_POST['aniadir'])) {
        if (!empty($_POST['checkProductos'])) {
            $arrayCheck = $_POST['checkProductos'];
            for ($i=0; $i < count($arrayCheck); $i++) { 
                $prod = $arrayCheck[$i];
                $cantidadProd = $_POST[$prod];
                $_SESSION['carro'][$prod] += $cantidadProd;
            }
        }

    }

    if (isset($_POST['vaciar'])) {
        $_SESSION['carro'] = [
            'Prod1' => 0,
            'Prod2' => 0,
            'Prod3' => 0,
            'Prod4' => 0
        ];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carro</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <th></th>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
                <th>ELIJA CANTIDAD</th>
                <th>PEDIDO ACTUAL</th>
            </tr>
            <?php
                foreach ($productoPrecio as $producto => $precio) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="checkProductos[]" value="' . $producto . '"></td>';
                    echo '<td><label>' . $producto . '</label></td>';
                    echo '<td><label>' . $precio . '€</label></td>';
                    echo '<td><select name="' . $producto . '">';

                    for ($i=1; $i <= 10; $i++) { 
                        echo '<option>' . $i . '</option>';
                    }

                    echo '</select></td>';
                    echo '<td>' . $_SESSION['carro'][$producto] . ' uds pedidas</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <button type="submit" name="aniadir">AÑADIR UNIDADES</button>
        <button type="submit" name="formalizar">FORMALIZAR COMPRA</button>
        <button type="submit" name="vaciar">VACIAR CARRO</button>
    </form>
    <?php

        if (isset($_POST['formalizar'])) {
            $total = 0;
            echo '<h2>Tu pedido</h2>';
            echo '<ul>';

            foreach ($_SESSION['carro'] as $producto => $cantidad) {
                if ($cantidad > 0) {
                    echo '<li>' . $producto . ', ' . $cantidad . ' unidades a ' . $productoPrecio[$producto] . '€</li>';
                    $total = $total + $cantidad * $productoPrecio[$producto];
                }
            }

            echo '</ul>';
            echo '<p>TOTAL: ' . $total . '€</p>';
        }

    ?>
</body>
</html>