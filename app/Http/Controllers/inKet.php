<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Ket;
class inKet extends Controller
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

    $ket=Ket::all();
    $Desa=Desa::all();
    return View('input.cKet')
    ->with('Ket',$ket)
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
  $ket -> idDes = $request->idDes;

  $ket->save();
  return redirect()->action('inKet@create');
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
    $Ket=Ket::find($id);
    $Desa=Desa::all();
    return View('edit.eKet')
    ->with('Ket',$Ket)
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
    $Ket -> idDes = $request->idDes;

    $Ket->save();

    $Ket=Ket::all();
    return redirect()->action('inKet@create');
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
  return redirect()->action('jadwalC@index');

  }
}
