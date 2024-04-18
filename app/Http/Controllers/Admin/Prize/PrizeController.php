<?php

namespace App\Http\Controllers\Admin\Prize;

use App\Http\Controllers\Controller;
use App\Models\Admin\Prize\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrizeController extends Controller
{
    public function list()
    {
        $list = Prize::get();
        return view("admin.prize.list",compact("list"));
    }

    public function add()
    {
        return view("admin.prize.add");
    }

    public function insert(Request $req)
    {
        $times = explode(" ", microtime());
        $photo = $req->photo;
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]).substr($times[0], 2, 3).".".$photo->extension();

        //如果public資料夾下沒有images資料夾,就建立一個資料夾
        if(!file_exists("images")){
            mkdir("images", 0777);  //777權限(可讀取,寫入,執行)
        }

        //如果public/images資料夾下沒有prize資料夾,就建立一個資料夾
        if(!file_exists("images/prize")){
            mkdir("images/prize", 0777);  
        }

        //php上傳檔案會暫存在temp,將上傳的檔案由暫存區移至images/prize資料夾下
        $photo->move("images/prize", $photoName);

        $prize = new Prize();
        $prize->title = $req->title;
        $prize->number = $req->number;
        $prize->content = $req->content;
        $prize->photo = $photoName;
        $prize->save();

        //用選的,才會自動use Illuminate\Support\Facades\Session;
        Session::flash("message", "已新增");
        return redirect("/admin/prize/list");
    }

    public function delete(Request $req)
    {
        Prize::destroy($req->id);

        return redirect("/admin/prize/list");
    }

    public function edit(Request $req)
    {
        //find: 在全部的qa中尋找, $req->id:傳進來的id
        // 相當於 SELECT * FROM qa WHERE id=xxx
        $prize = Prize::find($req->id);

        // compact:將資料傳到網頁中
        return view("admin.prize.edit",compact("prize"));
    }

    public function update(Request $req)
    {
        $prize = Prize::find($req->id);
        $photo = $req->photo;
        

        //如果有上傳圖檔
        if(!empty($photo)){
            //將原有圖檔從資料夾刪除
            @unlink("images/prize/" . $prize->photo);

            $times = explode(" ", microtime());
            //變更上傳檔案的檔名
            $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]).substr($times[0], 2, 3).".".$photo->extension();
            $photo->move("images/prize", $photoName);

        }else{
            //如果沒有上傳新圖,則檔名仍為原有檔名
            $photoName = $prize->photo;
        }

        $prize ->title = $req ->title;
        $prize ->number = $req ->number;
        $prize ->content = $req ->content;
        $prize ->photo = $photoName;
        $prize ->save();

        Session::flash("message", "已修改");
        return redirect("/admin/prize/list");
    }
}
