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
  public function getFullNameAttribute()
  {
    return ucfirst($this->nombres) . ' ' . ucfirst($this->apellidopaterno);
  }
  public function contrato(){
    return $this->hasManyThrough('App\Models\Contrato','App\Models\Telefono','socios_id','telefonos_id');
  }
}
