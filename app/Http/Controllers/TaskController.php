<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function index()
    {
        return Task::latest()->get();
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
        ]);

        return Task::create([
           'name' => $request['name'],
           'description' => $request['description'],
           'code' => $request['code'],
           'status' => $request['status'],
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
        ]);

        $Task = Task::findOrFail($id);

        $Task->update($request->all());
    }

    public function destroy($id)
    {
        $Task = Task::findOrFail($id);
        $Task->delete();
        return response()->json([
         'message' => 'Task deleted successfully'
        ]);
    }
}
