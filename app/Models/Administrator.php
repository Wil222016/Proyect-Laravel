<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrator
 *
 * @property $id
 * @property $Direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Administrator extends Model
{
  use HasFactory;

  static $rules = [
    'Direccion' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['Direccion'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function person()
  {
    return $this->hasOne('App\Models\Person', 'id', 'id');
  }
}
