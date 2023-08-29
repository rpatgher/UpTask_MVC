<?php

namespace Model;

class Proyecto extends ActiveRecord{
    protected static $tabla = 'Proyectos';
    protected static $columnasDB = ['id', 'proyecto', 'url', 'propietarioId'];

    public $proyecto;
    public $url;
    public $propietarioId;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->proyecto = $args['proyecto'] ?? '';
        $this->url = $args['url'] ?? '';
        $this->propietarioId = $args['propietarioId'] ?? '';
    }

    public function validarProyectos(){
        if(!$this->proyecto){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        return self::$alertas;
    }
}