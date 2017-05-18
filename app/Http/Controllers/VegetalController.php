<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vegetal;


class VegetalController extends Controller
{


  public function index()
  {
  $vegetales = Vegetal::all();
  return view('comidas.prueba', compact('vegetales'));
  }

}
