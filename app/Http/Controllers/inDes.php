<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\des;
use App\Kab;
use App\Prov;
use Hash;
use App\Http\Requests;
class inKab extends Controller
{
  public function index()
  {
    $des=des::all();
    $Kab=Kab::all();
    $Prov=Prov::all();
    return view('index.IndexDes')->with('Des',$Des)->with('Kab',$Kab)->with('Prov',$Prov);

  return View('index.IndexDes');
=======
use App\Desa;
use App\Kec;
use App\Prov;
use App\Kab;
class inDes extends Controller
{
  public function index()
  {
    $Kab=Kab::all();
    $Prov=Prov::all();
    $Kec=kec::all();
    $Desa=Desa::all();
    return view('index.IndexDesa')->with('Kab',$Kab)->with('Prov',$Prov)->with('Kec',$Kec)->with('Desa',$Desa);

>>>>>>> 5ce6bc8957a5d0d7bfe3dbd222e5837c2bc09024
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $des=des::all();
    $kab=Kab::all();
    $Prov=Prov::all();
    return View('input.cDesa')
    ->with('des',$des)
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

<<<<<<< HEAD
  $des = new des;
  $des -> desa = $request->desa;
  $des -> kabupaten = $request->kabupaten;
  $des -> idProv = $request->idProv;
  $des->save();
  return redirect()->action('inDes@index');
  //return redirect()->action('tugasC@index');
=======
$Desa = new Desa;
$Desa -> Des = $request->Des;
$Desa -> idKec = $request->idKec;
$Desa->save();
return redirect()->action('inDes@index');
//return redirect()->action('tugasC@index');
>>>>>>> 5ce6bc8957a5d0d7bfe3dbd222e5837c2bc09024
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
  $des=des::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $des=des::find($id)
    $kab=Kab::all();
    $Prov=Prov::all();
    return View('edit.cDesa')
    ->with('Des',$des)
    ->with('Kab',$kab);
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
    $des=des::find($id);
    $des -> desa = $resquest->desa;
    $des -> kabupaten = $request->kabupaten;
    $des -> idProv = $request->idProv;
    $des->save();


<<<<<<< HEAD
    $des=des::all();
=======
    $Desa=Desa::all();
>>>>>>> 5ce6bc8957a5d0d7bfe3dbd222e5837c2bc09024
    return redirect()->action('inDes@index');
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
    $des=des::find($id)
    ->delete();
    $des=des::find($id);
    $des=des::all();
  //redirect lagi
  return redirect()->action('inDes@index');

  }
}
