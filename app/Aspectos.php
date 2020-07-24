<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspectos extends Model
{
    protected $table = 'aspectos';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre'];

    public function clientes() {
        //return $this->belongsToMany('App\Clientes');
        return $this->belongsToMany(Aspectos::class,'aspecto_cliente','aspecto_id','cliente_id');
    }
}
