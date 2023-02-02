<?php

    $mensajeErrorTexto = '';
    $mensajeErrorDesplazamiento = '';
    $palabraCifrada = '';
    $letras = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","x","y","z");

    if (isset($_POST['cesar'])) {

        if (empty($_POST['texto'])) {
            $mensajeErrorTexto = '*Debes introducir un texto';
        }

        if (empty($_POST['desplazamiento'])) {
            $mensajeErrorDesplazamiento = '*Debes indicar un desplazamiento';
        }

        if (!empty($_POST['texto']) && !empty($_POST['desplazamiento'])) {
            $palabra = $_POST['texto'];
            $arrayPalabra = str_split($palabra);

            for ($i=0; $i < count($arrayPalabra); $i++) { 
                $numero = ord($arrayPalabra[$i]);
                $numero = $numero + intval($_POST['desplazamiento']);
                $palabraCifrada = $palabraCifrada . chr($numero);
            }
        }

    }

    if (isset($_POST['sustitucion'])) {

        $ficheroNombre = $_POST['ficheros'];
        
        if (empty($_POST['texto'])) {

            $mensajeErrorTexto = '*Debes introducir un texto';

        } else {

            $palabra = $_POST['texto'];
            $arrayPalabra = str_split($palabra);

            for ($i=0; $i < count($arrayPalabra); $i++) { 
                for ($j=0; $j < count($letras); $j++) { 
                    
                    if (strcmp(strtoupper($arrayPalabra[$i]), strtoupper($letras[$j])) === 0) {
                        $handle = fopen($ficheroNombre, "r");
                        while (!feof($handle)) {
                            $linea = fgets($handle);
                            $datos = str_split($linea);
                            $palabraCifrada = $palabraCifrada . strtoupper($datos[$j]);
                        }
                        fclose($handle);
                    }

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
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td><label>Texto a cifrar</label></td>
                <td><input type="text" name="texto" value="<?php
                    if (isset($_POST['cesar'])) {
                        if (!empty($_POST['texto']) && !empty($_POST['desplazamiento'])) {
                            echo strtoupper($_POST['texto']);
                        } else {
                            echo $_POST['texto'];
                        }
                    }
                ?>"></td>
                <td>
                    <?php
                        if (isset($_POST['cesar'])) {
                            echo $mensajeErrorTexto;
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label>Desplazamiento</label></td>
                <td>
                    <input type="radio" name="desplazamiento" value="3">3
                    <input type="radio" name="desplazamiento" value="5">5
                    <input type="radio" name="desplazamiento" value="10">10
                </td>
                <td><button type="submit" name="cesar">CIFRADO CESAR</button></td>
                <td><?php echo $mensajeErrorDesplazamiento; ?></td>
            </tr>
            <tr>
                <td><label>Fichero de clave</label></td>
                <td>
                    <select name="ficheros">
                        <option value="fichero1.txt">fichero_clave1.txt</option>
                        <option value="fichero2.txt">fichero_clave2.txt</option>
                        <option value="fichero3.txt">fichero_clave3.txt</option>
                    </select>
                </td>
                <td><button type="submit" name="sustitucion">CIFRADO POR SUSTITUCION</button></td>
            </tr>
        </table>
        <p><strong>
            <?php
                if (isset($_POST['cesar'])) {
                    if (!empty($_POST['texto']) && !empty($_POST['desplazamiento'])) {
                        echo 'Texto cifrado: ' . $palabraCifrada;
                    }
                }

                if (isset($_POST['sustitucion'])) {
                    if (!empty($_POST['texto'])) {
                        echo 'Texto cifrado: ' . $palabraCifrada;
                    }
                }
            ?>
        </strong></p>
    </form>
</body>
</html>