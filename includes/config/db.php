<?php

    function conectarDB() : mysqli{
        try {
            $DB = mysqli_connect( 'localhost', '', '', '' );
        } catch (\Throwable $th) {
            echo "<pre>";
            var_dump($th);
            echo "</pre>";
            exit;
        }

        return $DB;
    }