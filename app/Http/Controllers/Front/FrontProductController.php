<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function getlist()
    {       
        return response()->json(Product::all());
    }
}