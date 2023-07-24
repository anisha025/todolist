<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $tasks = Task::all();
        return view('home', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->task = $request->task;
        $task->duedate = $request->duedate;
        if (strtotime($task['duedate']) < time()) {
            $task['status'] = "Missed";
        } else {
            $task['status'] = "Pending";
        }
        $task->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $task = Task::find($id);
        $task->status = 'Completed';
        $task->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return back();
    }


    //functions for filter
    public function showAllTask()
    {
        $tasks = Task::orderBy('duedate', 'ASC')->get();

        return view('home', ['tasks' => $tasks]);
    }

    public function showMissedTask()
    {
        $tasks = Task::where('status', 'Missed')
            ->orderBy('duedate', 'ASC')
            ->get();

        return view('home', ['tasks' => $tasks]);
    }

    public function showPendingTask()
    {
        $tasks = Task::where('status', 'Pending')
            ->orderBy('duedate', 'ASC')
            ->get();

        return view('home', ['tasks' => $tasks]);
    }
    public function showCompletedTask()
    {
        $tasks = Task::where('status', 'Completed')
            ->orderBy('duedate', 'ASC')
            ->get();

        return view('home', ['tasks' => $tasks]);
    }
}
