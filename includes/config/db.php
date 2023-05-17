<?php

    function conectarDB() : mysqli{
        $DB = mysqli_connect( 'localhost', 'root', 'Demu1771$', 'registroAtraso' );

        if(!$DB){
            echo 'Conexion Fallida...';
            exit;
        }

        return $DB;
    }