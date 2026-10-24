<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livre extends Model {
    protected $fillable = [
        'auteur_id',
        'titre',
        'isbn',
        'prix',
        'stock',
        'date_publication',
        'disponible',
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'stock' => 'integer',
        'date_publication' => 'date',
        'disponible' => 'boolean',
    ];

    public function auteur(): BelongsTo {
        return $this->belongsTo(Auteur::class);
    }
}