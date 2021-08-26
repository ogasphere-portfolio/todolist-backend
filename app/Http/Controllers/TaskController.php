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

        return response()->json($task);
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
            $task->save();
            return response()->json($task);
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
        $task  = Task::find($id);
        if ($task !== null)
        {
            $task->completion = $request->input('completion');
            $task->save();
            return response()->json($task);
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
        $task  = Task::find($id);
        if ($task !== null)
        {
            $task->delete();
            return response()->json('Removed successfully.');
        }else {
            abort(404,"Pas le bon ID !");
        }

    }

}
