<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clases_Impartidas extends Model
{
    protected $table = 'clases_impartidas';

    protected $primaryKey = 'id';

    protected $fillable = ['hora','dia'];

    public function clientes() {
        return $this->belongsToMany(Clientes::class,'clases_impartida_cliente','clases_impartida_id','cliente_id');
    }

    public function users() {
        return $this->belongsToMany(User::class,'clases_impartida_user','clases_impartida_id','user_id');
    }

    public function clases()
    {
        return $this->belongsTo(Clases::class, 'clase_id');
    }

}
