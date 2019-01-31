<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class cuser extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $user=User::all();
    return view('index/indexUser')->with('User',$user);
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
    $user=User::find($id);

    return View('edit.eUser')
    ->with('User',$user);

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
    $user=User::find($id);
    $user -> name = $request->name;
    $user -> email = $request->email;
    $user-> Password= bcrypt($request->password);
    $user -> Status = $request->Status;
    $user->save();


    $user=User::all();
    return redirect()->action('cuser@index');
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
    $user=User::find($id)
    ->delete();
    $user=User::find($id);
    $user=User::all();
  //redirect lagi
  return redirect()->action('cuser@index');

  }
}
