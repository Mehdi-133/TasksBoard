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
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'status' => $task->status,
                'progress' => 0,
                'completed' => 0,
                'total' => 1,
                'due_date' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'dueDate' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'avatar' => $task->user->name ?? null,
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
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'status' => $task->status,
                'progress' => 50,
                'completed' => 0,
                'total' => 1,
                'due_date' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'dueDate' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'avatar' => $task->user->name ?? null,
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
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'status' => $task->status,
                'progress' => 100,
                'completed' => 1,
                'total' => 1,
                'due_date' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'dueDate' => $task->deadline ? $task->deadline->format('Y-m-d') : null,
                'avatar' => $task->user->name ?? null,
                'priority' => $task->priority
            ];
        })->toArray()"
    />
    
</x-kanban.board>

@endsection