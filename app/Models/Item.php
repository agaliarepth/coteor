<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $table='items';
     protected $fillable=['descripcion','codigo','tipo','estado','unidad','fecha_alta','categorias_id'];
     protected $hidden=[];

  public function categoria(){
     return $this->belongsTo('App\Models\Categoria','categorias_id');
}

public function routers(){
return $this->hasMany('App\Models\Equipos');
}
    public function detalle_ingresos(){
        return $this->hasMany('App\Models\DetalleIngreso','items_id','id');
    }
}
