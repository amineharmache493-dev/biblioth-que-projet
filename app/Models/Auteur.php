<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auteur extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'nationalite',
        'actif',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'actif' => 'boolean',
    ];

    public function livres(): HasMany {
        return $this->hasMany(Livre::class);
    }
}