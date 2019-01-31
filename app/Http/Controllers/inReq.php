<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\req;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Desa;
use App\Kab;
use App\Kec;
use App\Dus;
use App\Ket;

use App\Notifications\newDus;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Gate;
class inReq extends Controller
{
  public function index()
  {
    if(!Gate::allows('isUser'))
    {
       return response("404", 404);
    }
    $Req=req::all();
    $Kab=Kab::all();
    $uid=Auth::id();

    return view('index.indexReq')->with('req',$Req)->with('Kab',$Kab)->with('UID',$uid);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if(!Gate::allows('isUser'))
    {
       return response("404", 404);
    }
    $uid=Auth::id();
    $Req=req::all();
    $dus=Dus::all();
    $Kab=Kab::all();
    return View('input.cReq')
    ->with('UID',$uid)
    ->with('req',$Req)
    ->with('Kab',$Kab)
    ->with('Dus',$dus);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $Req = new req;
  $Req -> RtRw = $request->RtRw;
  $Req -> idDus = $request->idDus;
  $Req -> idUser = $request->idUser;
  $Req -> PotPel = $request->PotPel;
  $Req->save();
  //$user=User::where('Status','0')->first();
  //$user = User::where('Status', 0)->select("id", "name")->first();
  //print_r($user); die();
  //foreach ($user as $usr){
    //  $user->user->notify(new newDus($Req));
  //}
  // $user = User::whereHas('Status',function($query)
  // {
  //   $query->where('name','=','0');
  // })->get();
$user = User::where('Status',0)->get();
  //$user->user->notify(new newDus($Req));f
  \Notification::send($user, new newDus($Req));
  return redirect()->action('inReq@index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  $Req=req::find($id);
  return view('index.showReq')->with ('req',$Req);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    if(!Gate::allows('isUser'))
    {
       return response("404", 404);
    }
    $Req=req::find($id);
    $dus=Dus::all();
    $Kab=Kab::all();
    return View('edit.eReq')
    ->with('req',$Req)
    ->with('Kab',$Kab)
    ->with('Dus',$dus);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $Req=req::find($id);

    $Req -> RtRw = $request->RtRw;
    $Req -> PotPel = $request->PotPel;
    $Req -> idDus = $request->idDus;

    $Req->save();

    $Req=req::all();
    return redirect()->action('inReq@index');
    //redirect aja
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $Req=req::find($id)
    ->delete();
  //redirect lagi
  return redirect()->action('inReq@index');

  }
}
