<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vegetal;
use App\Carne;


class ComidaController extends Controller
{
  public function index() {
   return view('comidas.index');
}


  public function json(){

    $comidas= array();

    $vegetales= Vegetal::all();
    $carnes= Carne::all();

    $comidas[0] = (object) array('Vegetales' => $vegetales);
    $comidas[1] = (object) array('Carnes' => $carnes);

    return $comidas;
  }

}
