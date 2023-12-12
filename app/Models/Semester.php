<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Semester
 *
 * @property $id
 * @property $management
 * @property $startDate
 * @property $endDate
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property OfferedMenu[] $offeredMenuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Semester extends Model
{
  use HasFactory;
  static $rules = [
    'management' => 'required',
    'startDate' => 'required',
    'endDate' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['management', 'startDate', 'endDate', 'status'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function offeredMenuses()
  {
    return $this->hasMany('App\Models\OfferedMenu', 'semester_id', 'id');
  }
}
