<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntryRegister
 *
 * @property $id
 * @property $date
 * @property $quantity
 * @property $total
 * @property $status
 * @property $employee_id
 * @property $menu_offered_id
 * @property $reservation_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DrinkConsumption $drinkConsumption
 * @property Employee $employee
 * @property OfferedMenu $offeredMenu
 * @property Payment[] $payments
 * @property Reservation $reservation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EntryRegister extends Model
{
    use HasFactory;
    
    static $rules = [
		'date' => 'required',
		'quantity' => 'required',
		'total' => 'required',
		'status' => 'required',
		'employee_id' => 'required',
		'menu_offered_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','quantity','total','status','employee_id','menu_offered_id','reservation_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function drinkConsumption()
    {
        return $this->hasOne('App\Models\DrinkConsumption', 'entry_register_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function offeredMenu()
    {
        return $this->hasOne('App\Models\OfferedMenu', 'id', 'menu_offered_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Models\Payment', 'entry_register_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reservation()
    {
        return $this->hasOne('App\Models\Reservation', 'id', 'reservation_id');
    }
    

}
