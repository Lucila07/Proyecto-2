<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carne;


class CarneController extends Controller
{


  public function index()
  {
  return view('comidas.index');
  }

  public function json() {

    return Carne::all();
	}
}
