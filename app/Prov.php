<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prov extends Model
{
  protected $table = "Prov";
public $timestamps= false;
protected $fillable = ['id','provinsi'];
}
