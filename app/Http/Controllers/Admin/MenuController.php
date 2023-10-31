<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuController extends AdminController
{
    function index() {
        $datas = MenuCategory::get();
        $items = MenuItem::get();
        return view('admin.menu.index',[
            'categories'=>$datas,
            'items'=>$items,
        ]);
    }
    function store(Request $request) {
        
        $validated = $request->validateWithBag('menuItemCreate', [
            'menu_category_id'=>['required'],
            'photo'=>['required','image'],
            'name'=>['required'],
            'price'=>['required']
        ]);
        $validated['photo'] = $this->imageUpload($request->photo,'menu',$request->name.time());
        MenuItem::create($validated)->save();
        return back()->with('msg-success','Success Create Menu!');
        
    }
    function fetch(Request $request) {
        $menu = MenuItem::find($request->id);
        if($menu){
            return response(['code'=>302,'message'=>'Found!','data'=>$menu]);
        }
        return response(['code'=>404,'message'=>'Data not found!','data'=>NULL]);
        
    }
    function update(Request $request) {
        
        $validated = $request->validateWithBag('menuItemUpdate', [
            'menu_category_id'=>['required'],
            'name'=>['required'],
            'price'=>['required']
        ]);
        MenuItem::findOrFail($request->id)->update($validated);
        return back()->with('msg-success','Success Update Menu!');
        
    }
    function destroy(Request $request){
        MenuItem::findOrFail($request->id)->delete();
        return back()->with('msg-success','Success Delete Place!');
        
    }
/**
 * Menu Category Management
 */
    function cat_store(Request $request){
        
        $validated = $request->validateWithBag('menuCategoryCreate', [
            'name'=>['required']
        ]);

        MenuCategory::create($validated)->save();
        return back()->with('msg-success','Success Create Menu Category!');
        
    }
    function cat_update(Request $request){
        
    }
    function cat_destroy(Request $request){
        
    }
/**
 * Another Function
 */
    public function imageUpload($image,$location,$name)
    {
        $image_ext = ['jpg','JPG','JPEG','jpeg','png','PNG'];
        $url = public_path('assets/'.$location.'/');
        $name 		= $name.'.'.$image->getClientOriginalExtension();
        if(in_array($image->getClientOriginalExtension(), $image_ext)){
            if($image->move($url,$name)){
                return $name;
            }
            return 'default.jpg';
        }
        return 'default.jpg';
    }
}
