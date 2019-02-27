<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inReqAd extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $Req=req::all();
    $Kab=Kab::all();

    return view('index.indexReqAdmin')->with('req',$Req)->with('Kab',$Kab);
  }
}
