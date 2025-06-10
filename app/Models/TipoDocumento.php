<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'acronimo',
        'descripcion',
        'tipo_estatus_id',
        'user_id',
    ];



    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tipoEstatus() {
        return $this->belongsTo(TipoEstatus::class);
    }
}
