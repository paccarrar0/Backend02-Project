<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    protected $table = 'maintenances';

    protected $fillable = [
        'equipment_id',
        'description',
        'status',
    ];

    protected $errors = [];

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
