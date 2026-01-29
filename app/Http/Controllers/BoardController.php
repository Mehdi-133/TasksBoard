<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    /**
     * Display the kanban board with user-specific tasks
     * GUARANTEED USER ISOLATION - No cross-user data leakage
     */
    public function index()
    {
        // Get authenticated user ID - this is secure and cannot be manipulated
        $userId = Auth::id();
        
        // If user is not authenticated, return empty collections
        if (!$userId) {
            return view('tasks.index', [
                'tasks' => [
                    'todo' => collect(),
                    'in_progress' => collect(),
                    'done' => collect(),
                ]
            ]);
        }

        // DATABASE-LEVEL FILTERING - Only tasks belonging to authenticated user
        // This query NEVER loads tasks from other users
        $tasks = [
            'todo' => Task::where('user_id', $userId)
                         ->where('status', 'todo')
                         ->get(), // Only this user's todo tasks
                         
            'in_progress' => Task::where('user_id', $userId)
                             ->where('status', 'in_progress')
                             ->get(), // Only this user's in_progress tasks
                             
            'done' => Task::where('user_id', $userId)
                      ->where('status', 'done')
                      ->get(), // Only this user's done tasks
        ];

        // Return view with user-specific tasks only
        return view('tasks.index', compact('tasks'));
    }
}
