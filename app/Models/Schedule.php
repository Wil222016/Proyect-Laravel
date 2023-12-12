<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Schedule
 *
 * @property $id
 * @property $opening_time
 * @property $closing_time
 * @property $description
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property OfferedMenu[] $offeredMenuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schedule extends Model
{
  use HasFactory;

  static $rules = [
    'opening_time' => 'required',
    'closing_time' => 'required',
    'description' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['opening_time', 'closing_time', 'description', 'status'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function offeredMenuses()
  {
    return $this->hasMany('App\Models\OfferedMenu', 'schedule_id', 'id');
  }
}
