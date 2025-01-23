<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class area extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_area',
        'descripcion',
        'inventarios_id'
    ];


   

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
