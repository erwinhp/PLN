<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kab extends Model
{
  protected $table = "Kab";
public $timestamps= false;
protected $fillable = ['id','kabupaten','idProv'];
}
