<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dus extends Model
{
  protected $table = "Dus";
public $timestamps= false;
protected $fillable = ['id','Dusun','idDes'];
}
