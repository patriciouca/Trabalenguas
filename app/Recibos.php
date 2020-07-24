<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibos extends Model
{
    protected $table = 'recibos';

    protected $primaryKey = 'id';

    protected $fillable = ['concepto','precio','fecha_recibo','cliente_id'];
}
