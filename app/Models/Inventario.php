<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_propiedad',
        'numero_inquilino',
        'email_inquilino',
        'fecha',
        'codigo',
        'direccion',
        'tipo_inmuebles_id',
        'arrendador',
        'inquilino',
        'propietario',
        'nro_llaves',
        'user_id',
    ];

    protected static function booted(){
        static::creating(function ($inventario) {
            // Generar el código de inventario con el formato deseado
            if (empty($inventario->codigo)) {
                $ultimoCodigo = self::latest('id')->first(); // Obtener el último registro insertado
                $ultimoNumero = $ultimoCodigo ? (int) substr($ultimoCodigo->codigo, 7) : 0; // Extraer el número del código
                $nuevoNumero = $ultimoNumero + 1; // Incrementar el número

                // Formatear el nuevo código con 4 dígitos
                $inventario->codigo = 'DH-INV-' . str_pad($nuevoNumero, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tipo_inmueble(): BelongsTo{
        return $this->belongsTo(TipoInmueble::class, 'tipo_inmuebles_id');
    }

    public function areas()
{
    return $this->hasMany(Area::class, 'inventarios_id');
}


}
