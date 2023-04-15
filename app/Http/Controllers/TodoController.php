<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct(){
        $this->task = new Todo();
    }
    public function index(){
        //display task in todo 
        $response['tasks'] = $this->task->all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request){
        $this->task->create($request->all());
        //or
        // $this->task ->title = $request->title;
        // $this->task->save();

        return redirect()->back();
        //or
        //return redirect() -> route('home');


        
    }
    public function delete($task_id){
        //get value
        $task= $this->task->find($task_id);
        //delete
        $task->delete();

        return redirect()->back();
        // dd($task_id);

    }
    public function done($task_id){
        //get value
        $task= $this->task->find($task_id);
        //update
        $task->done = 1;
        $task->update();


        return redirect()->back();
        // dd($task_id);

    }
}
