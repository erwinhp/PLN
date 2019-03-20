<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class inuseruser extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    //$user=User::all();
    $user = User::where('Status', '=', 1)->get();
    return view('index/ajax/indexadmuser')->with('User',$user);
  }
}
  /**
