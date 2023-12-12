<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DishOfferedMenu
 *
 * @property $dish_id
 * @property $menu_offered_id
 *
 * @property Dish $dish
 * @property OfferedMenu $offeredMenu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DishOfferedMenu extends Model
{
    use HasFactory;
    
    static $rules = [
		'dish_id' => 'required',
		'menu_offered_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dish_id','menu_offered_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dish()
    {
        return $this->hasOne('App\Models\Dish', 'id', 'dish_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function offeredMenu()
    {
        return $this->hasOne('App\Models\OfferedMenu', 'id', 'menu_offered_id');
    }
    

}
