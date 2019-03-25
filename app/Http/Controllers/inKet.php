<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Kab;
use App\Kec;
use App\Dus;
use App\Ket;
use Illuminate\Support\Facades\Gate;
class inKet extends Controller
{
  public function index(Request $request)
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $ket=Ket::all();
    $Kab=Kab::all();
    return view('index.indexKet')->with('Ket',$ket)->with('Kab',$Kab);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $ket=Ket::all();
    $Kab=Kab::all();
    $Desa=Desa::all();
    $dus=Dus::all();
    return View('input.cKet')
    ->with('Ket',$ket)
    ->with('Kab',$Kab)
    ->with('Dus',$dus)
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

  $ket = new Ket;
  $ket -> RtRw = $request->RtRw;
  $ket -> PotPel = $request->PotPel;
  $ket -> Keterangan = $request->Keterangan;
  $ket -> idDus = $request->idDus;
  $ket->save();
  return redirect()->action('inKet@index');
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
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
  $ket=Ket::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $Ket=Ket::find($id);
    $Kab=Kab::all();
    $Desa=Desa::all();
    $dus=Dus::all();
    return View('edit.eKet')
    ->with('Ket',$Ket)
    ->with('Dus',$dus)
    ->with('Kab',$Kab)
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
    $Ket=Ket::find($id);

    $Ket -> RtRw = $request->RtRw;
    $Ket -> PotPel = $request->PotPel;
    $Ket -> Keterangan = $request->Keterangan;
    $Ket -> idDus = $request->idDus;

    $Ket->save();

    $Ket=Ket::all();
    return redirect()->action('inKet@index');
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
    $ket=Ket::find($id)
    ->delete();
    $ket=Ket::find($id);
    $ket=Ket::all();
  //redirect lagi

  return redirect()->action('inKet@index');

  }
}
