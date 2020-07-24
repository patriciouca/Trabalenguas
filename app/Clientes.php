<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'apellido1','apellido2','telefono','email','informe','foto','alergia_nota','aspectos_nota','tutor','nombre_padre','nombre_madre','hermanos','personas_conviven','presenta_informe','fecha_registro','fecha_nacimiento','cuota','colegio_id','foto'];

    public function clases_impartidas() {
        return $this->belongsToMany('App\Clases_Impartidas', 'clases_impartidas_clientes');
    }

    public function aspectos() {
        //return $this->belongsToMany('App\Aspectos', 'aspectos_clientes');
        //return $this->belongsToMany(Aspectos::class);
        return $this->belongsToMany(Aspectos::class,'aspecto_cliente','cliente_id','aspecto_id');
    }

    public function alergias() {
        //return $this->belongsToMany('App\Alergias','alergia_cliente','cliente_id','alergia_id');
        //return $this->belongsToMany(Alergias::class);
        return $this->belongsToMany(Alergias::class,'alergia_cliente','cliente_id','alergia_id');
    }

    public function recibos() {
        return $this->belongsToMany('App\Recibos');
    }

}
