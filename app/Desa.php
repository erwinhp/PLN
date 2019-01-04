<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
  protected $table = "Desa";
public $timestamps= false;
protected $fillable = ['id','Des','idKec'];
}
