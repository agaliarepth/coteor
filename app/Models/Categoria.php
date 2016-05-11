<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';
    protected $fillable=['descripcion','codigo'];
    protected $hidden=[];
public function materiales(){
return $this->hasMany('App\Models\Materiales');
}
}
