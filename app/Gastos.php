<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table = 'gastos';

    protected $primaryKey = 'id';

    protected $fillable = ['concepto','precio','fecha_recibo'];
}
