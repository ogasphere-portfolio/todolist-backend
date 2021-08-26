<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends CoreController
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    /**
     * list
     *
     * @return void
     */
    public function list()
    {
        $tasks  = Task::all();
        return response()->json($tasks);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $task = Task::find($id);
        if ($task !== null)
        {
            return response()->json($task);
        }else {
            abort(404,"Pas le bon ID !");
        }
    }

   /**
    * create
    *
    * @param  mixed $request
    * @return void
    */
    public function create(Request $request){

        $task = Task::create($request->all());
        if ($task->save()) {
            return response()->json($task,201);
           } else {
            return response()->json(['error' => 'Internal Server Error'], 500);
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
        $task  = Task::find($id);
        if ($task !== null)
        {
            $task->title = $request->input('title');
            $task->completion = $request->input('completion');
            $task->status = $request->input('status');
            $task->category_id = $request->input('category_id');

            if ($task->save()) {
                return response()->json($task,200);
               } else {
                return response()->json(['error' => 'Unauthorized'], 401);
               }
            $task->save();
            return response()->json($task);
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
        $task  = Task::find($id);
        if ($task !== null)
        {
            $task->completion = $request->input('completion');


            if ($task->save()) {
                return response()->json($task,200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
               }
        }else {
            return response()->json(['error' => 'ID not found or invalid.'], 404);
        }

    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id){
        $task  = Task::find($id);
        if ($task !== null)
        {
            if ($task->save()) {
                return response()->json('Removed successfully.',200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
               }
        }else {
            return response()->json(['error' => 'ID not found or invalid.'], 404);
        }
           

    }



}
