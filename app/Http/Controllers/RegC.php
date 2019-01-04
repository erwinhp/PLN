<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegC extends Controller
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

    $Desa=Desa::all();
    $user=user::all();
    return View('admin.input.createP')
    ->with('jadwal',$jadwal)
    ->with('user',$user);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  $Desa = new Desa;
  $Desa -> id = $request->id;
  $Desa -> Des = $request->Des;
  $Desa -> idKec = $request->idKec;
  $Desa->save();
  return redirect()->action('jadwalC@index');
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
  $Desa=Desa::find($id);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $Desa=Desa::find($id);
    return View('admin.edit.Ejadwal')
    ->with('Desa',$Desa)

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
    $Desa=Desa::find($id);
    $Desa -> id = $request->id;
    $Desa -> Des = $request->Des;
    $Desa -> idKec = $request->idKec;

    $Desa->save();

    $Desa=Desa::all();
    return redirect()->action('jadwalC@index');
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
    $Desa=Desa::find($id);
    ->delete();
    $Desa=Desa::find($id);
    $Desa=Desa::all();
  //redirect lagi
  return redirect()->action('jadwalC@index');

  }
}
