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

        $good->fill($form);
        $good->save();

        return redirect('admin/shop/create');
    }

    public function index(Request $request){
        $cond_title = $request->cond_title;
        if ($cond_title != ''){
            $posts = Good::where('goods', $cond_title)->get();
        } else {
            $posts = Good::all();
        }
        return view('admin.shop.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request){
        $good = Good::find($request->id);
        if (empty($good)) {
            abort(404);
        }
        return view('admin.shop.edit', ['shop_form' => $good]);
    }
    public function update(Request $request){
        $this->validate($reqeust, Good::$rules);
        $good = Good::find($request->id);
        $good_form = $request->all();
        if(isset($good_form['image'])){
            $path = $request->file('image')->store('public/image');
            $good->image_path = basename($path);
        } else {
            $good->image_path = null;
        }
        unset($news_form['_token']);
        unset($news_form['image']);

        $good->fill($good_form)->save();

        return redirect('admin/shop');


    }


}
