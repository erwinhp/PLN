<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\kec;
use App\Kab;

class inKec extends Controller
{

  public function index()
  {

        $kec=kec::all();
        $Kab=Kab::all();
          return view('index.IndexKec')->with('kec',$kec)->with('Kab',$Kab);



  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $kec=kec::all();
    $Kab=kab::all();
    return View('input.cKec')
    ->with('kec',$kec)->with('Kab',$Kab);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $kec = new kec;
  $kec -> kecamatan = $request->kecamatan;
  $kec -> idKab = $request->idKab;
  $kec->save();
  return redirect()->action('inKec@index');
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
  $kec=kec::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $kec=kec::find($id);
    $Kab=kab::all();
    return View('edit.eKec')
    ->with('kec',$kec)->with('Kab',$Kab);
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
    $kec=kec::find($id);
    $kec-> kecamatan = $request->kecamatan;
    $kec -> idKab = $request->idKab;
    $kec->save();

    $kec=Kec::all();
    return redirect()->action('inKec@index');

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
    $kec=kec::find($id)
    ->delete();
    $kec=kec::find($id);
    $kec=kec::all();
  //redirect lagi
  return redirect()->action('inKec@index');

  }
}
