<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
  protected $table = 'equipments';

  protected $fillable = [
    'name',
    'description',
    'category',
    'status',
    'rental_price',
    'location',
    'serial_number',
    'image_path',
  ];

  public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }
}
