<?php

namespace App\Http\Controllers;
use App\Anime;
use App\Genere;
use App\Episode;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function createFakeData(){
        $plot = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed risus id risus laoreet blandit. Curabitur tristique, massa nec fermentum bibendum, tortor augue accumsan nunc, vel ultrices libero nibh id nulla. Quisque lobortis justo erat, ac efficitur mi facilisis sit amet. Aliquam erat volutpat. Phasellus sollicitudin laoreet consequat. Nullam at rhoncus quam. Aenean pellentesque pulvinar leo. Praesent nunc elit, finibus id condimentum, lacinia sed enim. Donec posuere tellus sed nunc venenatis, sed imperdiet leo dictum. Phasellus et eleifend nunc. Quisque eu lectus metus. Proin libero justo, porta quis rhoncus , venenatis non quam. Aenean quis elit vitae justo vestibulum accumsan. Maecenas nibh mi, posuere semper orci quis, rhoncus egestas sapien.';
        $title = 'That Time I Got Reincarnated as a Slime';
        $img = 'https://cdn.masterani.me/wallpaper/3/2984D7lgN4j2.jpg';
        $vettore = array();
        $gen_name= array('Fantasy','Isekai','Comedy','Ecchi');
        $vect = array();
        for($i=0;$i<4;$i++){
            $gen = new Genere ($i,$gen_name[$i]);
            $vect[]= $gen->jsonSerialize();
        }

        for($i=48;$i>0;$i--){
            $obj = new Episode($i,1,$title,$plot,$vect,$img);
            $vettore[]= $obj->jsonSerialize();
            }
         return $vettore;
    }

    public function paginationControl(){
        /*connessione database: (finta per ora)*/
        $vettore=$this->createFakeData();
         /*passa a vue */
        $vettore2=json_encode($vettore);
        return view('home.home')->with('vettore',$vettore2);
    }
}
