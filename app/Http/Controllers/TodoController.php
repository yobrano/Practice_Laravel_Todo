<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

    public function todoCreate(Request $request){
        $todo_item = $request->validate([
            "label"=> ["required", "min:3", "max:156"],
            "start_date"=> "required",
            "start_time"=> "required",
            "end_date"=> "required",
            "end_time"=> "required",
            "tags"=> "required",
            "description"=> "required",
        ]);

        $todo_item["label"] = strip_tags($todo_item["label"]);
        $todo_item["start_date"] = strip_tags($todo_item["start_date"]);
        $todo_item["start_time"] = strip_tags($todo_item["start_time"]);
        $todo_item["end_date"] = strip_tags($todo_item["end_date"]);
        $todo_item["end_time"] = strip_tags($todo_item["end_time"]);
        $todo_item["tags"] = strip_tags($todo_item["tags"]);
        $todo_item["description"] = strip_tags($todo_item["description"]);

        $todo_item["user_id"] = auth()->id();

        Todo::create($todo_item);        
        return view("todo", ["todo_item"=>$todo_item, "todos"=>[]]);
        }

    public function todoRead(Request $request){
        $todos = [
            "master maths.",
            "master php",
            "master python",
            "master react",
            "do laundry",
        ];
        return view("todo", ["todos"=>$todos, "todo_item"=>["label"=>"yes"]]);
    }
    public function todoUpdate(Request $request){
        $todo_item = $request->validate([
            "label"=> ["required", "min:3", "max:156"],
            "start-date"=> "required",
            "start-time"=> "required",
            "end-date"=> "required",
            "end-time"=> "required",
            "tags"=> "required",
            "description"=> "required",
        ]);
    }
}
