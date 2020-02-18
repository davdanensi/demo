<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shops';

    protected $fillable = [
    	'name',
    	'address'
    	
    ];

    /**
     * Get the shop record associated with the Products.
     */
    public function products()
    {
        return $this->hasMany('App\Products', 'shop_id');
    }
}
