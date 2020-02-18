<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
// use Laravel\Cashier\Billable as BillableContract;

// class Products extends Model implements BillableContract
class Products extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    protected $fillable = [
    	'name',
    	'price',
    	'image',
        'shop_id',
        'category_id'
    ];

    /**
     * Get the shop record associated with the Products.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shops', 'shop_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    use Billable;
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];
}
