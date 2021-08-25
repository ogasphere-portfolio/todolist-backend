<?php

namespace App\Http\Controllers;

class CategoryController extends CoreController
{
    private $taskList = [];


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

        return response()->json($this->taskList);
    }
    public function item()
    {

        echo "TADATaskItem !!!!";

    }
}
