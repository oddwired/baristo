<?php

namespace Baristo\Http\Controllers;

use Baristo\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
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

    }

    public function getCategory(){

    }

    public function removeCategory(){

    }

    public function addItem(Request $request){

    }

    public function getItem(){

    }

    public function updateItem(){

    }

    public function removeItem(){

    }

    public function addSubItem(){

    }

    public function getSubItem(){

    }

    public function updateSubItem(){

    }

    public function removeSubItem(){

    }
}
