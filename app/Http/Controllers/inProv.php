<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prov;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class inProv extends Controller
{
  public function index()
  {
        $Prov=Prov::all();
          return view('index.IndexProv')->with('Prov',$Prov);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $prov=Prov::all();
    return View('input.inProvinsi')
    ->with('Prov',$prov);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $prov = new Prov;
  $prov -> provinsi = $request->provinsi;
  $prov->save();
  return redirect()->action('inProv@index');
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
  $prov=Prov::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $Prov=Prov::find($id);
    return View('edit.eProvinsi')
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
    $Prov=Prov::find($id);
    $Prov -> provinsi = $request->provinsi;
    $Prov->save();

    $Prov=Prov::all();
    return redirect()->action('inProv@create');
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
    $prov=Prov::find($id)
    ->delete();
    $prov=Prov::find($id);
    $prov=Prov::all();
  //redirect lagi
  return redirect()->action('inProv@index');

  }
}
