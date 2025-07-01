<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'name' => 'nullable|string|max:255',
      'description' => 'nullable|string|max:500',
      'category' => 'nullable|string|max:100',
      'status' => 'nullable|string|in:available,in_use,maintenance',
      'rental_price' => 'nullable|numeric|min:0',
      'location' => 'nullable|string|max:255',
      'serial_number' => 'nullable|string|max:100',
    ];
  }
}
