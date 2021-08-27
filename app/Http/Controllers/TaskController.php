<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $tasks  =  Task::all()->load('category');
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
            return response()->json(['error' => 'ID not found or invalid.'], 404);
        }
    }

   /**
    * create
    *
    * @param  mixed $request
    * @return void
    */
    public function create(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'completion' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

            $task = Task::create($request->all());



            if ($task->save()) {
                return response()->json($task,201);
            } else {
                return response()->json(['error' => 'Bad request'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            // Response::HTTP ==> use Symfony\Component\HttpFoundation\Response;



    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required',
            'completion' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);
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
                return response()->json(['error' => 'Internal Server Error'], 500);
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

       // je veux vérifier que mon utilisateur m'envoie AU MOINS UNE info
        // Adrien : Pour moi un Patch pourrait modifier plusieurs données,
        // le put serait là pour toutes les données d'un coup ^^

        // Si pas d'info, ERREUR
        $inputs = $request->all();
        // dd($inputs);
        if (count($inputs) === 0)
        {
            return abort(Response::HTTP_BAD_REQUEST, "BAD_REQUEST");
        }

        $taskToUpdate = Task::find($id);
        // Si il n'y a pas de résultat, notre objet $taskToUpdate sera égal à null
        if ($taskToUpdate === null)
        {
            return abort(Response::HTTP_NOT_FOUND, "NOT FOUND");
        }
        // si j'ai la valeur de title , je met à jour mon objet
        // https://lumen.laravel.com/docs/8.x/requests
        // If you would like to determine if a value is present on the request AND is not empty,
        // you may use the filled()
        if ($request->filled("title")){
            $taskToUpdate->title = $request->input("title");
        }
        if ($request->filled("categoryId")){
            $taskToUpdate->category_id = $request->input("categoryId");
        }
        if ($request->filled("completion")){
            $taskToUpdate->completion = $request->input("completion");
        }
        if ($request->filled("status")){
            $taskToUpdate->status = $request->input("status");
        }

        if ($taskToUpdate->save()){
            return response()->json($taskToUpdate, Response::HTTP_OK);
        }else {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR, "INTERNAL_SERVER_ERROR");
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
