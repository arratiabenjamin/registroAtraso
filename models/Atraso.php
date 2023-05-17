<?php

    namespace Model;

    class Atraso extends ActiveRecord{
        
        protected static $tabla = 'atrasos';
        protected static $columnas = ['id_atraso', 'fecha_atraso', 'hora_atraso', 'rut_estudiante', 'rut_func'];
        
    }