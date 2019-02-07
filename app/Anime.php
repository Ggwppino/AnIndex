<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    //
    protected $id;
    protected $name;
    protected $plot;
    protected $generes=array();
    protected $img;
    function __construct($id,$name,$plot, $generes,$img)
    {
        $this->id=$id;
        $this->name=$name;
        $this->plot=$plot;
        $this->generes=$generes;
        $this->img=$img;
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
    public function getPlot(){
        return $this->plot;
    }
    public function getGeneres(){
        return $this->generes;
    }
    public function getImg(){
        return $this->img;
    }
    //setter
    public function setId($id){
        $this->id=$id;
    }
    public function setName($name){
        $this->name=$name;
    }
    public function setPlot($plot){
        $this->plot=$plot;
    }
    //non credo servino
    public function jsonSerialize(){
        return ['id' => $this->getId(), 'name' => $this->getName(), 'plot' => $this->getPlot(), 'generes' => $this->getGeneres(), 'img' => $this->getImg()];
    }


}
