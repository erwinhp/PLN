<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class req extends Model
{
  protected $table = "req";
public $timestamps= false;
protected $fillable = ['id','RtRw','PotPel','Status','idDus','idUser'];
}
