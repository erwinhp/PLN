<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kab;
use App\kec;
use App\Desa;
use App\Dus;
use App\Ket;
use Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
class inKab extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $Kab=Kab::all();
    $kec=Kec::all();
    $desa=Desa::all();
    $dus=Dus::all();
    $ket=Ket::all();
    return view('index.IndexKab')->with('Kab',$Kab)->with('Kec',$kec)->with('Des',$desa)->with('Dus',$dus)->with('Ket',$ket);
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
    $kab=Kab::all();
    return View('input.cKab')
    ->with('Kab',$kab);
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
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
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
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $kab=Kab::find($id);

    return View('edit.eKab')
    ->with('Kab',$kab);

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
