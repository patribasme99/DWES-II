<?php

    if (isset($_GET['error']) && $_GET['error'] == true) {
        echo '<p style="color: red;">Combinación errónea de usuario-password</p>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
</head>
<body>
    <form action="autenticacion.php" method="post">
        <p>Si eres SOCIO, introduce tu usuario y password</p>
        <table>
            <tr>
                <td><label>USUARIO: </label></td>
                <td><input type="text" name="usuario"></td>
            </tr>
            <tr>
                <td><label>PASSWORD: </label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="accesoSocio">Acceso Socio</button></td>
            </tr>
        </table>
        <hr>
        <button type="submit" name="accesoInvitado">Acceso Invitado</button>
    </form>
</body>
</html>