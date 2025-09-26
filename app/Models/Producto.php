<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'sku';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'sku',
        'nombre',
        'precio_unitario',
    ];

    protected function casts(): array
    {
        return [
            'precio_unitario' => 'decimal:2',
        ];
    }

    public function cotizaciones()
    {
        return $this->belongsToMany(Cotizacion::class, 'cotizaciones_d', 'producto_sku', 'cotizacion_id')
            ->withPivot(['cantidad', 'precio_unitario'])
            ->withTimestamps();
    }
}


