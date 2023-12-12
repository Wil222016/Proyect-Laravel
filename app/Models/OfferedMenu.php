<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OfferedMenu
 *
 * @property $id
 * @property $price
 * @property $date
 * @property $photo
 * @property $status
 * @property $semester_id
 * @property $type_menu_id
 * @property $schedule_id
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Dish[] $dishes
 * @property DishOfferedMenu[] $dishOfferedMenuses
 * @property EntryRegister[] $entryRegisters
 * @property Reservation[] $reservations
 * @property Schedule $schedule
 * @property Semester $semester
 * @property TypeMenu $typeMenu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OfferedMenu extends Model
{
    use HasFactory;
    
    static $rules = [
		'price' => 'required',
		'date' => 'required',
        'photo'=> 'required',
		'status' => 'required',
		'semester_id' => 'required',
		'type_menu_id' => 'required',
		'schedule_id' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['price','date','photo','status','semester_id','type_menu_id','schedule_id','category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishes()
    {
        return $this->hasMany('App\Models\Dish', 'menu_offered_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishOfferedMenuses()
    {
        return $this->hasMany('App\Models\DishOfferedMenu', 'menu_offered_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entryRegisters()
    {
        return $this->hasMany('App\Models\EntryRegister', 'menu_offered_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation', 'menu_offered_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function schedule()
    {
        return $this->hasOne('App\Models\Schedule', 'id', 'schedule_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semester()
    {
        return $this->hasOne('App\Models\Semester', 'id', 'semester_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeMenu()
    {
        return $this->hasOne('App\Models\TypeMenu', 'id', 'type_menu_id');
    }
    

}
