<?php

namespace Model;

use DateTime;

class Atraso extends ActiveRecord
{

    public $id_atr;
    public $fecha_atr;
    public $hora_atr;
    public $comentario_atr;
    public $rut_estu;
    public $rut_func;

    protected static $tabla = 'atrasos';
    protected static $columnasDB = ['id_atr', 'fecha_atr', 'hora_atr', 'comentario_atr', 'rut_estu', 'rut_func'];

    public function __construct($args = [])
    {
        $this->id_atr = $args['id'] ?? null;
        $this->fecha_atr = $args['fecha'] ?? null;
        $this->hora_atr = $args['hora'] ?? null;
        $this->comentario_atr = $args['comentario_atr'] ?? null;
        $this->rut_estu = $args['rut_estu'] ?? null;
        $this->rut_func = $args['rut_func'] ?? null;
    }

    public function validar()
    {
        if (!$this->rut_estu) {
            self::$errores[] = 'El rut del alumno es Obligatorio.';
        }
        if (!Estudiante::findRecordColumnEspecific($this->rut_estu)) {
            self::$errores[] = 'Rut Inexistente.';
        }

        return self::$errores;
    }
}
