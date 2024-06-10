<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $lists = ToDoList::all();
        return view('list', [
            'todolists' => $lists
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required',
                'description' => 'nullable'
            ]
        );
        ToDoList::create($validated);

        return redirect('/list');
    }

    public function complete(Request $request, $id)
    {
        $todo = ToDoList::findOrFail($id);
        $todo->update(['isDone' => 1]);
        $todo->save();
        return redirect('/list');
    }

    public function delete($id)
    {
        $todo = ToDoList::findOrFail($id);
        $todo->delete();
        return redirect('/list');
    }

    public function edit($id)
    {
        $editData = ToDoList::find($id);
        return view('edit', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $todo = ToDoList::findOrFail($id);
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        $todo->save();
        return redirect('/list');
    }
}
