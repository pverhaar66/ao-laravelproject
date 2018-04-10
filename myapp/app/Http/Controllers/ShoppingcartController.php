<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ShoppingcartModel;

class ShoppingcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shoppingcart');
    }
    
    public function addToCart($product){
	$model = new ShoppingcartModel();
	$model->addProductToCart($product);
    }
}
