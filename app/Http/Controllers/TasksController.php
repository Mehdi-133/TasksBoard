<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = Task::all()->groupBy('status');
        return view('tasks.index' , compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:10|max:1000',
            'status' => 'required|in:todo,in_progress,done',
            'due_date' => 'required|date|after_or_equal:today',
            'priority' => 'required|in:low,medium,high',
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'deadline' => $validated['due_date'],
            'priority' => $validated['priority'],
            'user_id' => Auth::id(),
            'progress' => $validated['status'] === 'done' ? 100 : 0,
            'completed' => $validated['status'] === 'done',
            'total' => 1,
        ]);

        return redirect()->route('board')->with('success', 'Task created successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function show(Task $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Check if task exists and belongs to user
        if (!$task || $task->user_id !== Auth::id()) {
            return redirect()->route('board')->with('error', 'Task not found!');
        }

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:10|max:1000',
            'status' => 'required|in:todo,in_progress,done',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'deadline' => $validated['due_date'],
            'priority' => $validated['priority'],
            'progress' => $validated['status'] === 'done' ? 100 : 0,
            'completed' => $validated['status'] === 'done',
        ]);

        return redirect()->route('board')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        // Check if task exists and belongs to user
        if (!$task || $task->user_id !== Auth::id()) {
            return redirect()->route('board')->with('error', 'Task not found!');
        }

        // Since model uses SoftDeletes, this will soft delete
        $task->delete();
        
        return redirect()->route('board')->with('success', 'Task deleted successfully!');
    }

}