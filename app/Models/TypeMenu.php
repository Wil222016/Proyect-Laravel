<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeMenu
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property OfferedMenu[] $offeredMenuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeMenu extends Model
{
    use HasFactory;
    
    static $rules = [
		'name' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offeredMenuses()
    {
        return $this->hasMany('App\Models\OfferedMenu', 'type_menu_id', 'id');
    }
    

}
