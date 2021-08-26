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
            return response()->json(['error' => 'ID not found or invalid.'], 404);
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

            if ($category->save()) {
                return response()->json($category,200);
               } else {
                return response()->json(['error' => 'Unauthorized'], 401);
               }
            $category->save();
            return response()->json($category);
        }else {
            return response()->json(['error' => 'ID not found or invalid.'], 404);
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
            if ($category->save()) {
                return response()->json($category,200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
               }
        }else {
            return response()->json(['error' => 'ID not found or invalid.'], 404);
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
