<?php

namespace App\Http\Order;

/**
 * Description of OrderDetail
 *
 * @author Peter Verhaar
 */

class OrderDetail extends \Illuminate\Database\Eloquent\Model{
	public $table ="orderdetails";
	
	protected $fillable = ['article_id', 'amount'];
	
}
