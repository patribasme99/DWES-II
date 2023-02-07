<?php

    include 'libmenu.php';

    if (isset($_POST['accesoInvitado'])) {
        session_start();
        $_SESSION['usuario'] = 'Invitado';
        $_SESSION['descuento'] = 0;
        header('Location: pedido.php');
    }

    if (isset($_POST['accesoSocio'])) {
        
        if (autentica($_POST['usuario'], $_POST['password']) == 0) {
            header('Location: entrada.php?error=true');
        } else {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['descuento'] = dameDcto($_POST['usuario']);
            header('Location: pedido.php');
        }

    }

?>