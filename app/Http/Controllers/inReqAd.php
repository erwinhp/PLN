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





  public function edit($id)
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $Req=req::find($id);
    $dus=Dus::all();
    $Kab=Kab::all();
    return View('edit.eReqad')
    ->with('req',$Req)
    ->with('Kab',$Kab)
    ->with('Dus',$dus);
  }


  public function update(Request $request, $id)
  {
    $Req=req::find($id);

    $Req -> RtRw = $request->RtRw;
    $Req -> PotPel = $request->PotPel;
    $Req -> idDus = $request->idDus;
    $Req -> Status = $request->Status;
    $Req->save();

    $Req=req::all();
    return redirect()->action('inReqAd@index');
    //redirect aja
  }
}
