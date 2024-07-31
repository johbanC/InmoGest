<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'tipo',
        'carpeta',
        'user_id',
        'ficha_tecnicas_id',
    ];

    // Relación con FichaTecnica
    public function ficha_tecnica(): BelongsTo
    {
        return $this->belongsTo(FichaTecnica::class, 'ficha_tecnicas_id');
    }

    public function fichaTecnica(){
        return $this->belongsTo(FichaTecnica::class, 'ficha_tecnicas_id');
    }
}
