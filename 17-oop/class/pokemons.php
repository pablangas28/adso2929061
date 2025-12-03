<?php

include_once 'basedatos.php';

class pokemons extends basedata{
    
    //Propiedades y atributos
    public $name;
    public $tipo;
    public $trainer;


    //Constructor
    function __construct($name = null,$tipo = null, $trainer = null){
        $this->name = $name;
        $this->tipo = $tipo;
        $this->trainer = $trainer;
    }

    //Metodos
    //GET
    public function getName(){
        return $this->name;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getTrainer(){
        return $this->trainer;
    }
    //Metodos especificos

   public function listar()
   {
        $sql = "SELECT * FROM pokemons 
        ORDER BY id ASC";
        $this->conectar();
        $this->ejecutarSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}