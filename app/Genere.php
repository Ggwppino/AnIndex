<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    //
    protected $id;
    protected $name;
    function __construct($id,$name)
    {
        $this->id=$id;
        $this->name=$name;
    }
    //protected $generes= array();
    //non credo che servi manco il costruttore
    //getter
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    //setter
    public function setId($id){
        $this->id=$id;
    }
    public function setName($name){
        $this->name=$name;
    }
    //non credo servino
    public function jsonSerialize(){
        return ['id' => $this->getId(), 'name' => $this->getName()];
    }

}
