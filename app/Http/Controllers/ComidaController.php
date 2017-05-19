<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vegetal;
use App\Carne;
use App\Pasta;
use App\Minuta;

class ComidaController extends Controller
{
  public function index() {
   return view('comidas.index');
}


  public function json(){

    $comidas= array();

    $vegetales= Vegetal::all();
    $carnes= Carne::all();
    $pastas= Pasta::all();
    $minutas= Minuta::all();

    $comidas[0] = (object) array('Vegetales' => $vegetales);
    $comidas[1] = (object) array('Carnes' => $carnes);
    $comidas[2] = (object) array('Minutas' => $minutas);
    $comidas[3] = (object) array('Pastas' => $pastas);

    return $comidas;
  }

}
