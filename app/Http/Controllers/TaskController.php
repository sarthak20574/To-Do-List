<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // if 'show_all' == true, show( all tanks ie, done & pending
        $tasks = $request->has('show_all') ? Task::all() : Task::where('completed', false)->get();

        return view('tasks.index', compact('tasks'));
    }

    // adding new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tasks,title|max:255',
        ]);

        Task::create(['title' => $request->title]);
        return response()->json(['message' => 'Task added successfully!']);
    }

    // toggly taskss
    public function toggle($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return response()->json(['message' => 'Task updated successfully!', 'completed' => $task->completed]);
    }

    // del task
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return response()->json(['message' => 'Task deleted successfully!']);
    }
}
