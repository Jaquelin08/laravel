<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $table= "permisos";

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}
