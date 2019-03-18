<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\Notifications\newDus;
use Common;
class notificationAll extends Controller
{
  public function index()
  {
    if(!Gate::allows('isAdmin'))
    {
       return response("404", 404);
    }
    $datenow = Carbon::now();
    return view('index.indexNotifAll')->with('Datenow',$datenow);
  }



}
