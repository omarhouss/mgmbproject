<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;


class TasksController extends Controller
{
   public function first()
   {
      $tasks = Tasks::all();
      return view('admin.tasks')->with('tasks',$tasks);
   }
   public function save(Request $request)
   {
      $tasks = new Tasks;
      $tasks->name = $request->input('name');
      $tasks->Description = $request->input('descriptrion');
      $tasks->prize = $request->input('prize');
      $tasks->save();
      return redirect('/tasks')->with('success','task aded');
   }
   public function edit($id)
   {
      $tasks = Tasks::findorFail($id);
      return view('admin.task-edit')->with('tasks',$tasks);
   }
   public function updatetask(Request $request ,$id)
   {
      $tasks = Tasks::findOrFail($id);
      $tasks->name = $request->input('name');
      $tasks->description = $request->input('description');
      $tasks->prize = $request->input('prize');
      $tasks->update();
      return redirect('/tasks')->with('status','user is modified');

   }
   public function taskdel($id)
   {
      $tasks = Tasks::findOrFail($id);
      $tasks->delete();
      return redirect('/tasks')->with('status','user is delated');
   }
}
