<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegios extends Model
{
    protected $table = 'colegios';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre','localidad'];

    public function clientes() {
        return $this->belongsToMany('App\Clientes');
    }
}
