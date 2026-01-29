<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        if (!$userId) {
            return redirect('/login');
        }

        // Get user's tasks
        $tasks = Task::where('user_id', $userId)->get();
        
        // Calculate statistics
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 'done')->count();
        $inProgressTasks = $tasks->where('status', 'in_progress')->count();
        $todoTasks = $tasks->where('status', 'todo')->count();
        $overdueTasks = $tasks->where('deadline', '<', now())->where('status', '!=', 'done')->count();

        // Calculate completion rate
        $completionRate = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

        return view('statistics', compact(
            'totalTasks',
            'completedTasks', 
            'inProgressTasks',
            'todoTasks',
            'overdueTasks',
            'completionRate',
            'tasks'
        ));
    }
}
