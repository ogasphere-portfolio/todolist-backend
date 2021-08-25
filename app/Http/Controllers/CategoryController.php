<?php

namespace App\Http\Controllers;




use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CoreController
{



    public function create(Request $request){

        $categories = Category::create($request->all());

        return response()->json($categories);

    }

    public function item(Request $request, $id){
        $category  = Category::find($id);
        $category->name = $request->input('name');
        $category->status = $request->input('status');

        $category->save();

        return response()->json($category);
    }
    public function delete($id){
        $category  = Category::find($id);
        $category->delete();

        return response()->json('Removed successfully.');
    }
    public function list(){

        $categories  = Category::all();

        return response()->json($categories);

    }
}