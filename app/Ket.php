<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ket extends Model
{
  protected $table = "Ket";
public $timestamps= false;
protected $fillable = ['id','RtRw','PotPel','Keterangan','idDus'];
}
