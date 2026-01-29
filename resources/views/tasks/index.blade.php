@extends('layouts.kanban')

@section('content')
{{-- 
    Kanban Task Board Main Page
    SAFE: Only displays tasks passed from controller
    NO additional filtering - trusts controller for security
--}}

<x-kanban.board title="Project Dashboard" currentPage="board">
    
    {{-- Todo Column --}}
    <x-kanban.column 
        title="Todo" 
        status="blue" 
        :tasks="$tasks['todo']->map(function($task) {
            return [
                'title' => $task->title,
                'progress' => $task->progress ?? 0,
                'completed' => $task->completed ?? 0,
                'total' => $task->total ?? 1,
                'dueDate' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'avatar' => $task->avatar,
                'priority' => $task->priority
            ];
        })->toArray()"
    />

    {{-- In Progress Column --}}
    <x-kanban.column 
        title="In Progress" 
        status="yellow" 
        :tasks="$tasks['in_progress']->map(function($task) {
            return [
                'title' => $task->title,
                'progress' => $task->progress ?? 50,
                'completed' => $task->completed ?? 1,
                'total' => $task->total ?? 2,
                'dueDate' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'avatar' => $task->avatar,
                'priority' => $task->priority
            ];
        })->toArray()"
    />

    {{-- Done Column --}}
    <x-kanban.column 
        title="Done" 
        status="green" 
        :tasks="$tasks['done']->map(function($task) {
            return [
                'title' => $task->title,
                'progress' => 100,
                'completed' => $task->completed ?? 1,
                'total' => $task->total ?? 1,
                'dueDate' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'avatar' => $task->avatar,
                'priority' => $task->priority
            ];
        })->toArray()"
    />
    
</x-kanban.board>

@endsection
