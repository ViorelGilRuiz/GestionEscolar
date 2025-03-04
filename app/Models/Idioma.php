<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nivel',
        'titulo',
        'alumno_id'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
