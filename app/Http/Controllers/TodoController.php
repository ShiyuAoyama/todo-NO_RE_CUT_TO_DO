<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $todo = new Todo();
        $todo->content = $request->input('content');
        $todo->user_id = Auth::id();
        $todo->task_id = $request->input('task_id');
        $todo->done = false;
        $todo->save();

        return redirect()->route('tasks.index');
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Todo $todo)
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $request->validate([
            'content' => 'required',
        ]);
        $todo->content = $request->input('content');
        $todo->user_id = Auth::id();
        $todo->task_id = $todo->task->id;
        $todo->done = $request->boolean('done', $todo->done);
        $todo->update();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Todo $todo)
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->route('tasks.index');
    }
}
