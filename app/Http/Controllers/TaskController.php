<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->with('client')->where('status', 0)->get();
        return Inertia('Tasks/Index', [
            'tasks' => $tasks,
        ]);
    }

     public function search(Request $request) {
        $user = Auth::user();
        if(!empty($request->query)) {
             $ids = Task::search($request->input('query'))->get()->pluck('id');
             $tasks = Task::whereIn('id', $ids)->where('user_id', $user->id)->where('status', $request->status)->with('client')->get();
        } else {
            $tasks = Task::where('user_id', $user->id)->where('status', $request->status)->with('client')->get();
        }
       
        return Inertia('Tasks/Index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $clients = $user->clients()->get();
        return Inertia ('Tasks/Create', [
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'string',
            'client_id' => 'required',
            'priority' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $data['status'] = 0;
        $data['has_invoice'] = 0;

        $user->tasks()->create($data);
        return redirect()->route('task.index')->with('success', 'Zadanie zostało dodane.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    public function check(Request $request, Task $task) {
        $task->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'Zadanie oznaczone jako "Wykonane".');
    }

    public function uncheck(Request $request, Task $task) {
        $task->update([
            'status' => 0,
        ]);
        return redirect()->back()->with('success', 'Zadanie oznaczone jako "Do wykonania".');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Zadanie zostało usunięte.');
    }
}
