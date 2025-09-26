<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones_c';

    protected $fillable = [
        'usuario_id',
        'total_bruto',
        'fecha_emision',
    ];

    protected function casts(): array
    {
        return [
            'total_bruto' => 'decimal:2',
            'fecha_emision' => 'datetime',
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'cotizaciones_d', 'cotizacion_id', 'producto_sku')
            ->withPivot(['cantidad', 'precio_unitario'])
            ->withTimestamps();
    }
}


