<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kab;
use App\Kec;
class inKec extends Controller
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
    $kec=Kec::all();
    $Kab=kab::all();
    return View('input.cKec')
    ->with('Kec',$kec)
    ->with('Kab',$Kab);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $kec = new Kec;
  $kec -> kecamatan = $request->kecamatan;
  $kec -> idKab = $request->idKab;
  $kec->save();
  return redirect()->action('inKec@create');
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
  $kec=Kec::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $Kec=Kec::find($id);
      $Kab=kab::all();
    return View('edit.eKec')
    ->with('Kec',$Kec)
    ->with('Kab',$Kab);

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
      $Kec=Kec::find($id);
      $Kec -> kecamatan = $request->kecamatan;
      $Kec -> idKab = $request->idKab;
      $Kec->save();


    $kec=Kec::all();
    return redirect()->action('inKec@create');
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
    $kec=Kec::find($id)
    ->delete();
    $kec=Kec::find($id);
    $kec=Kec::all();
  //redirect lagi
  return redirect()->action('inKec@create');

  }
}