<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DishType
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $dish_count
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Dish[] $dishes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DishType extends Model
{
  use HasFactory;

  static $rules = [
    'name' => 'required',
    'description' => 'required',
    'dish_count' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'description', 'dish_count', 'status'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function dishes()
  {
    return $this->hasMany('App\Models\Dish', 'type_dish_id', 'id');
  }
}
