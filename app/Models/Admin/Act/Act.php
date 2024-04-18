<?php

namespace App\Models\Admin\Act;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Act extends Model
{
    public $timestamps = false;
    protected $table = "act";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "title",
        "content",
    ];

    public function getLayer2(){
        $list = DB::table("act_layer1 AS a")
            ->selectRaw("a.id, a.title, b.content")
            ->leftjoin("act_layer2 AS b", "a.id", "b.layer1")
            ->orderby("a.id", "ASC")
            ->get();

        return $list;
    }

    public function getLayer1()
    {
        // get(): 取全部資料, 與all()相同
        // first(): 取第一筆資料
        // paginate(10): 每10筆資料為一頁
        $list = DB::table("act_layer1")->get();
        return $list;
    }
}
