<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app/Desa;

class inReq extends Controller
{
  public function index()
  {

        $jadwal=jadwal::where('jadwal','>', Carbon::now())->orderBy('idPeg', 'asc')->orderBy('jadwal','asc')->get();
        $user=user::all();
          return view('admin.jadwal')->with('jadwal',$jadwal)->with('user',$user);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $Req=req::all();
    $Desa=Desa::all();
    return View('input.cReq')
    ->with('req',$Req)
    ->with('Desa',$Desa);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $Req = new Prov;
  $Req -> RtRw = $request->RtRw;
  $Req -> Status = $request->Status;
  $Req -> idDes = $request->idDes;
  $Req->save();
  return redirect()->action('inReq@create');
  //return redirect()->action('tugasC@index');
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

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $Req=$request::find($id);
    $Desa=Desa::all();
    return View('edit.eReq')
    ->with('req',$Req)
    ->with('Desa',$Desa);
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
    $Req -> Status = $request->Status;
    $Req -> idDes = $request->idDes;
    $Req->save();

    $Req=req::all();
    return redirect()->action('inReq@create');
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
    $Req=req::find($id);
    $Req=req::all();
  //redirect lagi
  return redirect()->action('inReq@create');

  }
}
