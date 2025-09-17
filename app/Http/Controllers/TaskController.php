<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->take(3)->get();
    
        $allTasksCount = Task::all()->count();
        if($allTasksCount > 0) {
            $unDoneTasks = round((Task::where('is_done', 0)->count() / $allTasksCount) * 100);
            $doneTasks = round((Task::where('is_done', 1)->count() / $allTasksCount) * 100);
        }else {
            $unDoneTasks = 0;
            $doneTasks = 0;
        }

        return view('pages.index', compact('tasks', 'unDoneTasks', 'doneTasks'));
    }

    public function showAll(Request $request) {
        if($request->has('show_all')) {
            $tasks = Task::where('user_id', auth()->user()->id)->orderby('created_at', 'desc')->get();
        }else {
            $tasks = Task::where('user_id', auth()->user()->id)->where('is_done', 0)->orderby('created_at', 'desc')->get();
        }
        return view('pages.showAll')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:4'], 
            'body' => 'required'
        ]);

        $task = new Task(); 

        $task->title = $request->input('title');
        $task->body = $request->input('body');
        $task->user_id = auth()->user()->id;
        $task->save();

        return back()->with('success', 'Task added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findorfail($id);
        return view('pages.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findorfail($id); 
        return view('pages.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'min:4'], 
            'body' => 'required'
        ]);

        $task = Task::findorfail($id); 

        $task->title = $request->input('title');
        $task->body = $request->input('body');
        $task->save();

        return back()->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findorfail($id); 

        $task->delete(); 

        return redirect('/tasks/all')->with('success', 'Task Deleted successfully!');
    }


     public function done(string $id)
    {
        $task = Task::findorfail($id);
        $isDone = $task->is_done;
        $task->is_done = $isDone ? 0 : 1;
        $task->save();
        return back();
    }
}
