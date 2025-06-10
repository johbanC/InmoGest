<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'tipo_cliente_id',
        'tipo_estatus_id',
        'user_id'
    ];


    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tipoEstatus()
    {
        return $this->belongsTo(TipoEstatus::class);
    }

    public function tipoCliente()
    {
        return $this->belongsTo(TipoCliente::class);
    }
}
