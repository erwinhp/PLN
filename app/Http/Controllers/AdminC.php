<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminC extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user=user::all();
    $peg=user::where('status',1)->get();
    return view('admin.admin')
    ->with('peg',$peg);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
 $user = new user;
     $user -> name = $request->name;
     $user -> email = $request->email;
     $user -> password = Hash::make($request->password);
     $user -> Status = $request->Status;

 $user->save();
 $user=user::all();

 return redirect()->action('AdminC@index');

   }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user=user::find($id);
    return view('admin.edit.eadmin')->with('user',$user);

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
    $user=user::find($id);
    $user -> name = $request->name;
    $user -> email = $request->email;
    $user -> password = Hash::make($request->password);
    $user -> Status = $request->Status;

    $user->save();

    $user=user::all();

    return redirect()->action('AdminC@index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = user::find($id)
    ->delete();
    $user=user::all();

    return redirect()->action('staffC@index');
  }
}
