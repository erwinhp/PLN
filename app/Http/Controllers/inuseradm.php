<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class inuseradm extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    //$user=User::all();
    $user = User::where('Status', '=', 0)->get();
    return view('index/ajax/indexadmin')->with('User',$user);
  }
}
  /**
