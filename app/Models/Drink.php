<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Drink
 *
 * @property $id
 * @property $name
 * @property $price
 * @property $description
 * @property $photo
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property DrinkConsumption[] $drinkConsumptions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Drink extends Model
{
  use HasFactory;

  static $rules = [
    'name' => 'required',
    'price' => 'required',
    'description' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'price', 'description', 'photo', 'status'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function drinkConsumptions()
  {
    return $this->hasMany('App\Models\DrinkConsumption', 'drink_id', 'id');
  }
}
