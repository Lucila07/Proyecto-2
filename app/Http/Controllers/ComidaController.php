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

  public function edit($id, $categoria) {
if ($categoria=="Vegetal")
    $categoria_seleccionada = Vegetal::find($id);

  else
          if ($categoria=="Carne")
          $categoria_seleccionada = Carne::find($id);

          else
              if ($categoria=="Minuta")
                $categoria_seleccionada = Minuta::find($id);

              else
                  if ($categoria=="Pasta")
                    $categoria_seleccionada = Pasta::find($id);
    return $categoria_seleccionada;
  //  return $categoria::find($id);
  }

  public function buttonSave(Request $request){
  $id = Input::get('comida_id');
  $nombre= Input::get('nombre');
  $categoria= Input::get('categoria_id');

  if ($categoria=="Vegetal")
      $categoria_seleccionada = Vegetal::find($id);
    else
            if ($categoria=="Carne")
            $categoria_seleccionada = Carne::find($id);

            else
                if ($categoria=="Minuta")
                  $categoria_seleccionada = Minuta::find($id);

                else
                    if ($categoria=="Pasta")
                      $categoria_seleccionada = Pasta::find($id);


  $categoria_seleccionada->Nombre=$nombre;
  $categoria_seleccionada->save();
  Input::file('image')->move('Imagenes', $id.'-'.$categoria.'.png');
  return redirect()->action('ComidaController@index');
}

public function buttonAñadir(Request $request){

  $categoria = Input::get('categoria_id');
  $nombre= Input::get('nombre');

}

}
