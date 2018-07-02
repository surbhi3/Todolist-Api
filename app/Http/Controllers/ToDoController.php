<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use Auth;
use DB;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $task;
    public function __construct()
    {
        //$this->middleware('auth');
       // $this->task = $task;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request , $id)
    {
        $this->validate($request, [
            'task' => 'required',
            'description' => 'required'
        ]);
        return ToDo::create([
            'user_id' =>$id,
            'task'=>$request->input('task'),
            'description'=>$request->input('description'),
            //'api_token' => app('hash')->make('ge2guihcksnlkcsjopjj'),
        ]);
    }

    public function deleteTask($id)
    {
        $task = ToDo::find($id);
        $task->delete();

        return response()->json('Removed successfully');
    }

    public function viewtask($user_id)
    {
        $tasks = DB::table('todo')->where('user_id', $user_id)->get();
        return response()->json($tasks);
    }

    /*
     * function to update a task
     * use x-www-form-urlencoded type
     * or raw type and header(content-type=> application/json
     *
     */
    public function updatetask(Request $request ,$id)
    {
       $user_id = DB::table('todo')->where('id', $id)->pluck('user_id');
        $tasks = DB::table('todo') ->where('id',$id)->update(['user_id' =>$user_id , 'task' => $request->input ('task') ,
            'description' => $request->input('description')]);

       return response()->json('Updated successfully');
        return response()->json($tasks);
    }
}