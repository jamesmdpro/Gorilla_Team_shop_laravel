<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reto extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'retos';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'ciudad',
        'altura',
        'peso',
        'objetivo',
        'terminos',
        'completado',
        'fecha_inicio',
        'fecha_fin',
        'notas'
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'terminos' => 'boolean',
        'completado' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];
}