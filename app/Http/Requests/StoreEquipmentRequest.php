<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'name' => 'required|string|max:255',
      'description' => 'nullable|string|max:500',
      'category' => 'required|string|max:100',
      'status' => 'required|string|in:available,in_use,maintenance',
      'rental_price' => 'required|numeric|min:0',
      'location' => 'required|string|max:255',
      'serial_number' => 'required|string|max:100',
    ];
  }
}
