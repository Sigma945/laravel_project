<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = "pid";
    protected $fillable = [
        "pid",
        "pname",
        "photo",
    ];

}
