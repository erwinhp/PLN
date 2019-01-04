<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kec extends Model
{
  protected $table = "Kec";
public $timestamps= false;
protected $fillable = ['id','kecamatan','idKab'];
}
