<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;

class ShopController extends Controller
{
    public function add(){
        return view('admin.shop.create');
    }

    public function create(Request $request){

        $this->validate($request, Good::$rules);

        $good = new Good;
        $form = $request->all();

        if (isset($form['image'])){
            $path = $request->file('image')->store('public/image');
            $good->image_path = basename($path);
        } else {
            $good->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        return redirect('admin/shop/create');
    }


}
