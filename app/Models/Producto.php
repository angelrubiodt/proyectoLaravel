<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    /**
     * Los atributos que son asignables masivamente.
     */
    protected $fillable = [
        'placa',
        'tipo_material',
        'cantidad',
        'precio'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     */
    protected $casts = [
        'cantidad' => 'integer',
        'precio' => 'decimal:2'
    ];

    /**
     * Indica si los campos created_at y updated_at deben ser gestionados automáticamente.
     *
     * @var bool
     */
    public $timestamps = true;
}
