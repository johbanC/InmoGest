<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'nombre_item',
        'cantidad',
        'material',
        'estado',
        'observacion',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}