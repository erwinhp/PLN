<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Kab;
use App\Kec;
use App\Dus;
use Illuminate\Support\Facades\Gate;
class inDus extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $dus=Dus::all();
    $Kab=Kab::all();
    return view('index.indexDus')->with('Dus',$dus)->with('Kab',$Kab);

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
    $dus=Dus::all();
    $Desa=Desa::all();
    $Kab=Kab::all();
    return View('input.cDus')
    ->with('Dus',$dus)->with('Kab',$Kab)->with('Desa',$Desa);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $dus = new Dus;
  $dus -> Dusun = $request->Dusun;
  $dus -> idDes = $request->idDes;
  $dus->save();
  return redirect()->action('inDus@index');
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
  $dus=Dus::find($id);

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
    $dus=Dus::find($id);
    $Kab=Kab::all();
    $Desa=Desa::all();
    return View('edit.eDus')
    ->with('Dus',$dus)->with('Kab',$Kab)->with('Desa',$Desa);

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
    $dus=Dus::find($id);
    $dus -> Dusun = $request->Dusun;
    $dus -> idDes = $request->idDes;
    $dus->save();


    $dus=Dus::all();
    return redirect()->action('inDus@index');
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
    $dus=Dus::find($id)
    ->delete();
    $dus=Dus::find($id);
    $dus=Dus::all();
  //redirect lagi
  return redirect()->action('inKab@index');

  }
}
