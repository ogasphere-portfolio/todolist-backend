<?php

namespace App\Http\Controllers;

use App\Models\Task;

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
    public function list()
    {

        $tasks  = Task::all();

        return response()->json($tasks);
    }
    public function item()
    {

        echo "TADATaskItem !!!!";

    }
}
