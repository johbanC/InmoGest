<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'ruta_foto',
        'tipo',
        'codigo',
        'carpeta',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}