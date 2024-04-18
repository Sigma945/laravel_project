<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Act\Act;
use Illuminate\Http\Request;

class FrontActController extends Controller
{
    public function getlist()
    {       
        return response()->json(Act::get());
    }

    public function getLayer2()
    {       
        $list =(new Act())->getLayer2();
        return response()->json($list);
    }

    public function getLayer1()
    {       
        $list =(new Act())->getLayer1();
        return response()->json($list);
    }
}
