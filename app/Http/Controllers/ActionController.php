<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
class ActionController extends Controller
{
    public function store(Request $request, Action $task){
 
 
        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
        $task->sortorder = Action::max("sortorder") + 1;

        $task->save();
 
        return response()->json([
            "action"=> "inserted",
            "tid" => $task->id
        ]);
    }
 
 
    public function destroy(Action $task){
        $task->delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
    public function update($id, Request $request){
        $task = Action::find($id);
     
        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
     
        $task->save();
     
        if($request->has("target")){
            $this->updateOrder($id, $request->target);
        }
     
        return response()->json([
            "action"=> "updated"
        ]);
    }
     
    private function updateOrder($taskId, $target){
        $nextTask = false;
        $targetId = $target;
     
        if(strpos($target, "next:") === 0){
            $targetId = substr($target, strlen("next:"));
            $nextTask = true;
        }
     
        if($targetId == "null")
            return;
     
        $targetOrder = Action::find($targetId)->sortorder;
        if($nextTask)
            $targetOrder++;
     
        Action::where("sortorder", ">=", $targetOrder)->increment("sortorder");
     
        $updatedTask = Action::find($taskId);
        $updatedTask->sortorder = $targetOrder;
        $updatedTask->save();
    }
}
