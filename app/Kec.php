<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kec extends Model
{
  protected $table = "kec";
public $timestamps= false;
protected $fillable = ['id','kecamatan','idKec'];
}
