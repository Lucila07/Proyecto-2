<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vegetal;
use App\Carne;
use App\Pasta;
use App\Minuta;
use Illuminate\Support\Facades\Input;


class ComidaController extends Controller
{
  public function index() {

    $vegetales= Vegetal::all();
    $carnes= Carne::all();
    $pastas= Pasta::all();
    $minutas= Minuta::all();

     return view('comidas.index')
      ->with('vegetales', $vegetales)
      ->with('carnes', $carnes)
      ->with('pastas', $pastas)
      ->with('minutas', $minutas);
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

  public function edit($id) {

 return Vegetal::find($id);
  }

  public function buttonSave(Request $request){

  $id = Input::get('comida_id');
  $nombre= Input::get('nombre');

  $vegetales = Vegetal::find($id);
  $vegetales->Nombre=$nombre;
  $vegetales->save();

  $vegetales= Vegetal::all();
  $carnes= Carne::all();
  $pastas= Pasta::all();
  $minutas= Minuta::all();

  
 Input::file('image')->move('Imagenes', $id.'.png');
     return view('comidas.index')
      ->with('vegetales', $vegetales)
      ->with('carnes', $carnes)
      ->with('pastas', $pastas)
      ->with('minutas', $minutas);
}




}
