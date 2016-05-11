<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table="equipos";
    protected $fillable=["codigo","marca","modelo","estado","observaciones","fecha_alta","items_id"];
    protected $hidden=[];

  public function item()
  {
    return $this->belongsTo('App\Models\Item','items_id');
  }
}
