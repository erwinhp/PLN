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
class inReqAd extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    //$Req=req::all();
    $Kab=Kab::all();
    $Dus=Dus::all();
    $User=User::all();
    $Req = req::orderBy('PotPel', 'DESC')->get();
    return view('index.indexReqAdmin')->with('req',$Req)->with('Kab',$Kab)->with('user',$User)->with('dus',$Dus);
  }
}
