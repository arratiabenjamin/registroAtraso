<?php

    define( 'FUNCIONES_URL', __DIR__ . 'funcion.php' );

    //Funciones
    //Debuguear una Variable
    function debugear($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        exit;
    }
    //Sanitizar codigo HTML
    function sanitizar($html){
        $s = htmlspecialchars($html);
        return $s;
    }
    //Mostrar Mensaje de Resultado
    function mostrarMensaje($codMsj){
        $msj = '';
        switch($codMsj){
            case 1:
                $msj = 'Atraso Registrado Exitosamente';
                break;
            case 2:
                $msj = 'Atraso Modificado Exitosamente';
                break;
            case 3:
                $msj = 'Atraso Eliminado Exitosamente';
                break;
            default:
                $msj = null;
                break;
        }
        
        return $msj;
    }

    function validarEntidad($entidad){
        $entidades = ['atraso', 'estudiante', 'apoderado', 'funcionario'];
        return in_array($entidad, $entidades);
    }

    //PENDIENTE DE TERMINAR
    function comprobacionUrl($url){
        $id = $_GET['$id'] ?? null;
    }