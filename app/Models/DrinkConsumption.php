<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DrinkConsumption
 *
 * @property $quantity
 * @property $unit_price
 * @property $entry_register_id
 * @property $drink_id
 *
 * @property Drink $drink
 * @property EntryRegister $entryRegister
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DrinkConsumption extends Model
{
    use HasFactory;
    
    static $rules = [
		'quantity' => 'required',
		'unit_price' => 'required',
		'entry_register_id' => 'required',
		'drink_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity','unit_price','entry_register_id','drink_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function drink()
    {
        return $this->hasOne('App\Models\Drink', 'id', 'drink_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entryRegister()
    {
        return $this->hasOne('App\Models\EntryRegister', 'id', 'entry_register_id');
    }
    

}
