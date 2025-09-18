<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatosBancarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'banco',
        'tipo_cuenta',
        'numero_cuenta',
        'moneda',
        'user_id'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}