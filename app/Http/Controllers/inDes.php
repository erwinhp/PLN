<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Kab;
use App\Kec;
use Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
class inDes extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
	     return response("404", 404);
    }
    else {
      $des=Desa::all();
      $kec=kec::all();
      $kab=Kab::all();
      return view('Index.IndexDesa')->with('Desa',$des)->with('Kec',$kec)->with('Kab',$kab);

    }


}


  public function create()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $des=Desa::all();
    $kec=kec::all();
    $kab=Kab::all();
    return View('input.cDesa')
    ->with('des',$des)
    ->with('Kab',$kab)
    ->with('Kec',$kec);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  $des = new Desa;
  $des -> Des = $request->Des;
  $des -> idKec = $request->idKec;
  $des->save();
  return redirect()->action('inDes@index');
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
  $des=Desa::find($id);

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
    $des=Desa::find($id);
    $kab=Kab::all();
    $kec=Kec::all();
    return View('edit.eDesa')->with('Des',$des)->with('Kec',$kec)->with('Kab',$kab);
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
    $des=Desa::find($id);
    $des -> Des = $request->Des;
    $des -> idKec = $request->idKec;
    $des->save();
    $des=Desa::all();
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
    $des=Desa::find($id)
    ->delete();
    $des=Desa::find($id);
    $des=Desa::all();
  //redirect lagi
  return redirect()->action('inDes@index');

  }
}
