<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @property $id
 * @property $amount
 * @property $payment_method
 * @property $receipt
 * @property $status
 * @property $reservation_id
 * @property $entry_register_id
 * @property $created_at
 * @property $updated_at
 *
 * @property EntryRegister $entryRegister
 * @property Reservation $reservation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Payment extends Model
{
    use HasFactory;
    
    static $rules = [
		'amount' => 'required',
		'payment_method' => 'required',
		'receipt' => 'required',
		'status' => 'required',
		'reservation_id' => 'required',
		'entry_register_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['amount','payment_method','receipt','status','reservation_id','entry_register_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entryRegister()
    {
        return $this->hasOne('App\Models\EntryRegister', 'id', 'entry_register_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reservation()
    {
        return $this->hasOne('App\Models\Reservation', 'id', 'reservation_id');
    }
    

}
