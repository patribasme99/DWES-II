<?php

    function autentica($usuario, $password) {
        $fp = fopen("socios.txt", "r");
        while(!feof($fp)) {       
            $linea = fgets($fp);
            $datos = explode(" ", $linea);
            
            if ((strcmp($datos[0], $usuario) === 0) && (strcmp($datos[1], $password) === 0)) {
                return 1;
            }
        }        
        fclose($fp);
        return 0;
    }

    function dameDcto($usuario) {
        $fp = fopen("socios.txt", "r");
        while(!feof($fp)) {       
            $linea = fgets($fp);
            $datos = explode(" ", $linea);
            
            if (strcmp($datos[0], $usuario) === 0) {
                return $datos[2];
            }
        }        
        fclose($fp);
        return 0;
    }

    function damePlatos($tipoPlato) {
        $arrayPlatos = array();

        $fp = fopen("platos.txt", "r");
        while(!feof($fp)) {       
            $linea = fgets($fp);
            $datos = explode(" ", $linea);
            
            if (strcmp($datos[1], $tipoPlato) === 0) {
                $arrayPlatos[$datos[0]] = $datos[2];
            }
        }        
        fclose($fp);

        return $arrayPlatos;
    }

    function damePrecio($nombrePlato) {

        $fp = fopen("platos.txt", "r");
        while(!feof($fp)) {       
            $linea = fgets($fp);
            $datos = explode(" ", $linea);
            
            if (strcmp($datos[0], $nombrePlato) === 0) {
                return $datos[2];
            }
        }        
        fclose($fp);

        return 0;
    }

?>