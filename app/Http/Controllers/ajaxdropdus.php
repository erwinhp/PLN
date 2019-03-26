<?php

namespace App\Http\Controllers;
use App\Kec;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ajaxdropdus extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    //$user=User::all();
    return view('index/ajax/ajaxDropDus');
  }
}
