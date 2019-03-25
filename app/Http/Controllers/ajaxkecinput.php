<?php

namespace App\Http\Controllers;
use App\Kec;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ajaxkecinput extends Controller
{
  public function index()
  {
    //$user=User::all();
    return view('index/ajax/ajaxinputKec');
  }
}
