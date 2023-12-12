<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dish
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $status
 * @property $type_dish_id
 * @property $menu_offered_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DishOfferedMenu $dishOfferedMenu
 * @property DishType $dishType
 * @property OfferedMenu $offeredMenu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dish extends Model
{
    use HasFactory;
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'status' => 'required',
		'type_dish_id' => 'required',
		'menu_offered_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','status','type_dish_id','menu_offered_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dishOfferedMenu()
    {
        return $this->hasMany('App\Models\DishOfferedMenu', 'dish_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dishType()
    {
        return $this->hasOne('App\Models\DishType', 'id', 'type_dish_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function offeredMenu()
    {
        return $this->hasOne('App\Models\OfferedMenu', 'id', 'menu_offered_id');
    }
    

}
