<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vegetal;


class VegetalController extends Controller
{



  public function json() {

    return Vegetal::all();
	}
}
