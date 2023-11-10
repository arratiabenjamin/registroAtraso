<?php

    function conectarDB() : mysqli{
        

        $DB = mysqli_connect( 'localhost', 'root', 'Demu1771$', 'registroatrasos' );
        
        if(!$DB){
            die("Conexion Fallida..." . mysqli_connect_error());
            exit;
        }

        return $DB;
    }