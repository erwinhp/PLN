<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kab;
use App\Prov;
use Hash;
use App\Http\Requests;
class inKab extends Controller
{
  public function index()
  {
    $Kab=Kab::all();
    $Prov=Prov::all();
    return view('index.IndexKab')->with('Kab',$Kab)->with('Prov',$Prov);

  return View('index.IndexKab');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $kab=Kab::all();
    $Prov=Prov::all();
    return View('input.cKab')
    ->with('Kab',$kab)
    ->with('Prov',$Prov);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $kab = new Kab;
  $kab -> kabupaten = $request->kabupaten;
  $kab -> idProv = $request->idProv;
  $kab->save();
  return redirect()->action('inKab@index');
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
  $kab=Kab::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $kab=Kab::find($id);
    $Prov=Prov::all();
    return View('edit.eKab')
    ->with('Kab',$kab)
    ->with('Prov',$Prov);

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
    $kab=Kab::find($id);
    $kab -> kabupaten = $request->kabupaten;
    $kab -> idProv = $request->idProv;
    $kab->save();


    $kab=Kab::all();
    return redirect()->action('inKab@index');
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
    $kab=Kab::find($id)
    ->delete();
    $kab=Kab::find($id);
    $Kab=Kab::all();
  //redirect lagi
  return redirect()->action('inKab@index');

  }
}
