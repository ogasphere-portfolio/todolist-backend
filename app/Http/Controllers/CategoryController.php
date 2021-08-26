<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CoreController
{

    /**
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request){

        $categories = Category::create($request->all());


       if ($categories->save()) {
        return response()->json($categories,201);
       } else {
        return response()->json(['error' => 'Internal Server Error'], 500);
       }

    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category !== null)
        {
            return response()->json($category);
        }else {
            abort(404,"Pas le bon ID !");
        }

    }
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id){
        $category  = Category::find($id);
        if ($category !== null)
        {
            $category->name = $request->input('name');
            $category->status = $request->input('status');

            $category->save();
            return response()->json($category);
        }else {
            abort(404,"Pas le bon ID !");
        }
    }

    /**
     * patch
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function patch(Request $request, $id){
        $category  = Category::find($id);
        if ($category !== null)
        {
            $category->status = $request->input('status');
            $category->save();
            return response()->json($category);
        }else {
            abort(404,"Pas le bon ID !");
        }

    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id){
        $category  = Category::find($id);
        if ($category !== null)
        {
            $category->delete();
            return response()->json('Removed successfully.');
        }else {
            abort(404,"Pas le bon ID !");
        }

    }

    /**
     * list
     *
     * @return void
     */
    public function list(){
        $categories  = Category::all();
        return response()->json($categories);

    }
}
