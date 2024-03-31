<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Egulias\EmailValidator\Warning\TLD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks;
        return view('tasks.index', compact('tasks'));
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
        $request->validate([
            'title' => 'required',
        ]);

        $task = new Task();
        $task->title = $request->input('title');
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('tasks.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tasks.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);


        $request->validate([
            'title' => 'required',
        ]);

        $task->title = $request->input('title');
        $task->user_id = Auth::id();
        $task->update();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index');
    }

    // Yuri's code
    // public function destroy($id)
    // {
    //     Task::destroy($id);
    //     return redirect()->route('home');
    // }


}
