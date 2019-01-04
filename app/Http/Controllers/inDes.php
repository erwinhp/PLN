<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Kec;
class inDes extends Controller
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
    $Kec=Kec::all();
    return View('input.cDesa')
    ->with('Desa',$Desa)
    ->with('Kec',$Kec);
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
$Desa -> Des = $request->Des;
$Desa -> idKec = $request->idKec;
$Desa->save();
return redirect()->action('inDes@create');
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
    $Kec=Kec::all();
    return View('edit.eDesa')
    ->with('Desa',$Desa)
    ->with('Kec',$Kec);

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
    $Desa -> Des = $request->Des;
    $Desa -> idKec = $request->idKec;

    $Desa->save();

    $Desa=Desa::all();
    return redirect()->action('inDes@create');
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
    $Desa=Desa::find($id)
    ->delete();
    $Desa=Desa::find($id);
    $Desa=Desa::all();
  //redirect lagi
  return redirect()->action('jadwalC@index');

  }
}
