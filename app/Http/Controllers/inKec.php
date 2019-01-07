<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\kec;
use App\Http\Requests;
use App\Http\Controllers\Controller;
=======
use App\Kab;
use App\Prov;
use App\Kec;
>>>>>>> 5ce6bc8957a5d0d7bfe3dbd222e5837c2bc09024
class inKec extends Controller
{
  public function index()
  {
<<<<<<< HEAD
        $kec=kec::all();
          return view('index.IndexKec')->with('kec',$kec);
=======

    $Kab=Kab::all();
    $Prov=Prov::all();
    $Kec=kec::all();
    return view('index.IndexKec')->with('Kab',$Kab)->with('Prov',$Prov)->with('Kec',$Kec);

>>>>>>> 5ce6bc8957a5d0d7bfe3dbd222e5837c2bc09024
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $kec=kec::all();
    return View('input.cKec')
    ->with('kec',$kec);
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
    return View('edit.eKec')
    ->with('kec',$kec);
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
    $kec->save();

<<<<<<< HEAD
    $kec=kec::all();
    return redirect()->action('inKec@create');
=======
    $kec=Kec::all();
    return redirect()->action('inKec@index');
>>>>>>> 5ce6bc8957a5d0d7bfe3dbd222e5837c2bc09024
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
