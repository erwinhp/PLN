<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Desa;
use App\Kab;
use App\Kec;
use App\Dus;
use App\Ket;
use App\req;
use App\User;
use Illuminate\Support\Facades\Auth;
class ControllChart extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $Req=req::all();
    $Kab=Kab::all();
    $uid=Auth::id();
    $dus=Dus::all();

    return view('index.dusChart')->with('req',$Req)->with('Kab',$Kab)->with('UID',$uid)->with('Dus',$dus);
  }

}
