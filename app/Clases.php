<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clases extends Model
{
    use SoftDeletes;

    protected $table = 'clases';

    protected $primaryKey = 'id';

    protected $fillable = ['nombre', 'duracion'];

    public function clases_impartidas()
    {
        return $this->hasMany(Clases_Impartidas::class);
    }
}
