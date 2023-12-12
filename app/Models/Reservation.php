<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Reservation
 *
 * @property $id
 * @property $date
 * @property $num_people
 * @property $total_amount
 * @property $receipt
 * @property $status
 * @property $client_id
 * @property $person_id
 * @property $menu_offered_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property EntryRegister[] $entryRegisters
 * @property OfferedMenu $offeredMenu
 * @property Payment[] $payments
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reservation extends Model
{
    use HasFactory;
    
    static $rules = [
		'date' => 'required',
		'required|integer|min:0|max:10',
		'total_amount' => 'required',		
		'status' => 'required',
		'client_id' => 'required',
		'person_id' => 'required',
		'menu_offered_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','num_people','total_amount','receipt','status','client_id','person_id','menu_offered_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entryRegisters()
    {
        return $this->hasMany('App\Models\EntryRegister', 'reservation_id', 'id');
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
        return $this->hasMany('App\Models\Payment', 'reservation_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function person()
    {
        return $this->hasOne('App\Models\Person', 'id', 'person_id');
    }
    

}
