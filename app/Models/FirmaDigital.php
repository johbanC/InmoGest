<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FirmaDigital extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documentable_type',
        'documentable_id',
        'rol_firmante',
        'nombre_firmante',
        'tipo_documento_firmante', // Nuevo: DNI, pasaporte, etc.
        'numero_documento_firmante', // Nuevo
        'firma_digital_path',
        'firma_digital_base64', // Nuevo: base64 del archivo
        'json_base64', // Nuevo: base64 del json
        'foto_firmante_path',
        'ip_address',
        'hash_validacion',
        'dispositivo',
        'consentimiento',
        'snapshot_data',
        'fecha_firma', // Nuevo campo explícito
        'ubicacion' // Donde se realizó la firma
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dispositivo' => 'array',
        'snapshot_data' => 'array',
        'consentimiento' => 'boolean',
        'deleted_at' => 'datetime',
        'fecha_firma' => 'datetime'
    ];

    /**
     * Relación polimórfica con cualquier documento
     */
    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Boot del modelo - Genera hash automáticamente
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->hash_validacion = $model->generarHash();
            $model->fecha_firma = $model->fecha_firma ?? now();
        });
    }

    /**
     * Genera el hash de validación
     */
    public function generarHash(): string
    {
        return hash('sha256', implode('|', [
            $this->firma_digital_path,
            $this->foto_firmante_path ?? '',
            $this->ip_address,
            $this->documentable_type,
            $this->documentable_id,
            $this->numero_documento_firmante,
            now()->toIso8601String()
        ]));
    }

    /**
     * Verifica la integridad de la firma
     */
    public function verificarIntegridad(): bool
    {
        return $this->hash_validacion === $this->generarHash();
    }

    /**
     * Scope para filtrar por tipo de documento
     */
    public function scopePorTipoDocumento($query, string $type)
    {
        return $query->where('documentable_type', $type);
    }

    /**
     * Scope para filtrar por rol del firmante
     */
    public function scopePorRolFirmante($query, string $rol)
    {
        return $query->where('rol_firmante', $rol);
    }

    /**
     * Scope para firmas por documento de identidad
     */
    public function scopePorDocumentoFirmante($query, string $tipo, string $numero)
    {
        return $query->where([
            'tipo_documento_firmante' => $tipo,
            'numero_documento_firmante' => $numero
        ]);
    }
}