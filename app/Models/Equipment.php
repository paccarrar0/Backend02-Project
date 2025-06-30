<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
