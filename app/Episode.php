<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    private $ep;
    private $info;
    public function __construct($ep,$id,$name,$plot,$generes,$img)
    {
        $this->ep=$ep;
        $this->info = new Anime($id,$name,$plot,$generes,$img);
    }

    public function getEp(){
        return $this->ep;
    }

    public function jsonSerialize(){
        return ['ep' => $this->getep(), 'info' => $this->info->jsonSerialize()];
    }
}
