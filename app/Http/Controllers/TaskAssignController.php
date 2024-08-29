<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskAssignController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Task::create([
            'title'       =>$request->title,
            'due_date'    =>$request->due_date,
            'description' =>$request->description,
        ]);
        return redirect()->back()->with('message','Task Assign Successfully');
    }


    public function show($id)
    {

    }

    public function showM($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public  function pending($id)
    {
        $task = Task::findOrFail($id)->update(['status'=> 1]);
        return redirect()->back()->with('message','Task Assign   Pending');

    }

    public  function progress($id)
    {
        $task = Task::findOrFail($id)->update(['status'=> 2]);
        return redirect()->back()->with('message','Task Assign   Progress');

    }

    public  function completed($id)
    {
        $task = Task::findOrFail($id)->update(['status'=> 3]);
        return redirect()->back()->with('message','Task Assign   Completed');

    }

    public  function ready($id)
    {
        $task = Task::findOrFail($id)->update(['status'=> 0]);
        return redirect()->back()->with('message','Task Assign   Ready');

    }




    public function edit($id)
    {
        $task = Task::find($id);
        return view('Back.DashBoard.edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        Task::find($id)->update([
            'status'      =>$request->status,
            'title'       =>$request->title,
            'due_date'    =>$request->due_date,
            'description' =>$request->description,
        ]);
        return redirect()->route('dashboard')->with('message','Task Update Successfully');
    }


    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('dashboard')->with('message','Task Delete Successfully');

    }
}
