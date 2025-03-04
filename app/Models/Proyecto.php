<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'horas_previstas',
        'fecha_comienzo',
        'user_id'
    ];

    protected $casts = [
        'fecha_comienzo' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}
