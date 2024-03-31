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
    public function show($id)
    {
        $todo = Todo::with('task')->where('id', $id)->first();
        return view('todos.show', compact('todo'));
    }


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
        // dd('yuri');
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

    public function updateDescription(Request $request, $id)
    {
        // dd($request->input('description'));
        $todo = Todo::find($id);
        $todo->description = $request->input('description');
        $todo->update();

        return back();
    }

    public function updateContent(Request $request, $id)
    {
        $todo = Todo::find($id);
        $task = Task::find($todo->task_id);

        $todo->content = $request->input('content');
        $todo->update();

        if($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('storage/images'), $imageName);
            $task->image = $imageName;
        }

        $task->title = $request->input('title');
        $task->update();

        return back();
    }
    
}
