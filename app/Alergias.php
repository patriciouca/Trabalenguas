<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergias extends Model
{
    protected $table = 'alergias';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre'];

    public function clientes() {
        //return $this->belongsToMany(Clientes::class);
        //return $this->belongsToMany('App\Clientes','alergias_clientes','user_id','alergia_id');
        return $this->belongsToMany(Clientes::class,'alergia_cliente','alergia_id','cliente_id');
    }
}
