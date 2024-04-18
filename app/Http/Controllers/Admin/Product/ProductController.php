<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function list(){
        $list = Product::get();
        return view("admin.product.list",compact("list"));
    }

    public function add(){
        return view("admin.product.add");
    }

    public function insert(Request $req){
        $times = explode(" ", microtime());
        $photo = $req->photo;
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]).substr($times[0], 2, 3).".".$photo->extension();


        if(!file_exists("images")){
            mkdir("images", 0777);  
        }

        if(!file_exists("images/prize")){
            mkdir("images/product", 0777);  
        }

        //php上傳檔案會暫存在temp,將上傳的檔案由暫存區移至images/prize資料夾下
        $photo->move("images/product", $photoName);

        $product = new Product();
        $product->pname = $req->pname;
        $product->photo = $photoName;
        $product->save();

        Session::flash("message", "已新增");
        return redirect("/admin/product/list");
    }

    public function edit(Request $req){
        $product = Product::find($req->pid);
        return view("admin.product.edit",compact("product"));
    }

    public function update(Request $req){
        $product = Product::find($req->pid);
        $photo = $req->photo;
        

        //如果有上傳圖檔
        if(!empty($photo)){
            //將原有圖檔從資料夾刪除
            @unlink("images/product/" . $product->photo);

            $times = explode(" ", microtime());
            //變更上傳檔案的檔名
            $photoName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]).substr($times[0], 2, 3).".".$photo->extension();
            $photo->move("images/product", $photoName);

        }else{
            //如果沒有上傳新圖,則檔名仍為原有檔名
            $photoName = $product->photo;
        }

        $product ->pname = $req ->pname;
        $product ->photo = $photoName;
        $product ->save();

        Session::flash("message", "已修改");
        return redirect("/admin/product/list");
    }

    public function delete(Request $req){
        Product::destroy($req->pid);
        return redirect("/admin/product/list");
    }
}
