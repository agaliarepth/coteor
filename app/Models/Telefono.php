<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table='telefonos';
    protected $fillable=[
      'tipolinea',
      'numero',
      'zona',
      'barrio',
      'direccion',
      'socios_id'
    ];
    protected $hidden=[];

    public function socio(){
      return $this->belongsTo('App\Models\Socio','socios_id');
    }

}
