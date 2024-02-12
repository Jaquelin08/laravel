<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    
    protected $table = "profesor";

    protected $fillable = [
        'numero_empleado',
        'nombre',
        'numero_horas',
        'puesto_id',
        'division_id',
        'inicio_contrato',
        'fin_contrato',
    ];

    // Relación con la tabla 'division'
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }
}
