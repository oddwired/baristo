<?php

namespace Baristo\Http\Controllers;

use Baristo\Category;
use Baristo\Item;
use Baristo\Subitem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menu = Category::with('items', 'items.subitems')->get();

        return view('admin.menu', ['menu'=>$menu]);
    }
    public function createCategory(Request $request){
        $this->validate($request, [
            'title'=> 'required'
        ]);

        if(Category::create(['title'=> $request->title])){
            return back()->with(['info'=> 'Success']);
        }

        return back()->withErrors(['error'=> 'An error occurred!']);
    }

    public function updateCategory(Request $request){
        $this->validate($request, [
            'title'=> 'required'
        ]);

        Category::where('id', $request->category_id)->update(['title'=>$request->title]);
        return back();
    }

    public function getCategory(){

    }

    public function removeCategory(){

    }

    public function addItem(Request $request){
        $this->validate($request,[
            'title'=> 'required'
        ]);

        $data = [
            'icon'=> $request->icon,
            'title'=> $request->title,
            'category_id'=> $request->category_id
        ];
        if(Item::create($data)){
            return back()->with(['info'=>'Item created successfully.']);
        }

        return back()->withErrors(['error'=> 'An error occurred!']);
    }

    public function getItem(){

    }

    public function updateItem(){

    }

    public function removeItem(){

    }

    public function addSubItem(Request $request){
        $this->validate($request,[
            'title'=> 'required',
            'price'=> 'required'
        ]);

        $data = [
            'item_id'=> $request->item_id,
            'title'=> $request->title,
            'price'=> $request->price
        ];

        if(Subitem::create($data)){
            return back()->with(['info'=> 'Menu item added successfully.']);
        }

        return back()->withErrors(['error'=> 'An error occurred!']);
    }

    public function getSubItem(){

    }

    public function updateSubItem(){

    }

    public function removeSubItem(){

    }
}
