<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        if (!$userId) {
            return view('tasks.index', [
                'tasks' => [
                    'todo' => collect(),
                    'in_progress' => collect(),
                    'done' => collect(),
                ]
            ]);
        }

        $tasks = [
            'todo' => Task::where('user_id', $userId)
                         ->where('status', 'todo')
                         ->get(),
            'in_progress' => Task::where('user_id', $userId)
                             ->where('status', 'in_progress')
                             ->get(),
            'done' => Task::where('user_id', $userId)
                      ->where('status', 'done')
                      ->get(),
        ];

        return view('tasks.index', compact('tasks'));
    }
}
