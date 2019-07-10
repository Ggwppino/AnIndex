<?php

namespace App\Http\Controllers;
use App\GenereOld;
use App\EpisodeOld;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function createFakeData(){

    }

    public function paginationControl(){
        /*connessione database: (finta per ora)*/
        $vettore=$this->createFakeData();
         /*passa a vue */
        $vettore2=json_encode($vettore);
        return view('home.home')->with('vettore',$vettore2);
    }
}
