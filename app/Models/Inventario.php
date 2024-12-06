<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion',
        'tipo_inmuebles_id',
        'arrendador',
        'inquilino',
        'propietario',
        'nro_llaves',
        'user_id',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tipo_inmueble(): BelongsTo{
        return $this->belongsTo(TipoInmueble::class, 'tipo_inmuebles_id');
    }
}
