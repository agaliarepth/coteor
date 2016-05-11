<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
  protected $table= "socios";

    protected $fillable=[
      'nombres',
      'apellidopaterno',
      'apellidomaterno',
      'ci',
      'celular',
      'email'
    ];
    protected $hidden=[];

    public function telefonos(){
      return $this->hasMany('App\Models\telefono');
    }
}
