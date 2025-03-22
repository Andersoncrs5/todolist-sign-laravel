<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\TaskModel;
use Illuminate\Support\Facades\DB;

class TaskControlller extends Controller
{

    private function get(int $id) : TaskModel | RedirectResponse
    {
        try
        {
            if ($id <= 0 && !$id) {
                return redirect()->route('home')->with('error', 'Id is required');
            }

            $task = TaskModel::find($id);

            if (!$task)
            {
                return redirect()->route('home')->with('error', 'Task not found');
            }

            return $task;
        }
        catch (\Exception $e)
        {
            return redirect()->route('home')->with('error', 'Error');
        }
    }

    function deleteTask(int $id) : RedirectResponse
    {
        DB::beginTransaction();
        try
        {
            $task = $this->get($id);

            $task->delete();
            DB::commit();
            return redirect()->route('home')->with('success', 'Task deleted');
        } catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('home')->with('error', 'Error');
        }
    }

    function home(): View | RedirectResponse
    {
        try {
            $user = UserModel::find(session("id"));
            $tasks = $user->tasks()->get()->toArray();

            return view("home", compact("tasks"));
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function createTask(): View | RedirectResponse
    {
        try
        {
            return view("task.createTask");
        }
        catch (\Exception $e)
        {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function creatingTask(CreateTaskRequest $r) : RedirectResponse
    {
        try
        {
            DB::beginTransaction();
            $data = $r->all();
            $data['fk_user_id'] = session("id");

            TaskModel::create($data);

            DB::commit();
            return redirect()->route('home')->with('success', 'Task created!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function updateTask(int $id): View | RedirectResponse
    {
        try
        {
            $task = $this->get($id);

            return view('task.updateTask', compact("task"));
        }
        catch (\Exception $e)
        {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function updatingTask(int $id, CreateTaskRequest $r)
    {
        try
        {
            $task = $this->get($id);

            $data = $r->all();

            $task->update($data);

            return redirect()->route('home')->with('success', 'Task updated');
        }
        catch (\Exception $e)
        {
            return redirect()->route('home')->with('error', 'Error');
        }
    }

    function changeStatus(int $id) : RedirectResponse {
        try {
            $task = $this->get($id);

            $task->completed = !$task->completed;
            $task->save();

            return redirect()->route('home')->with('success', 'Task status Changed!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Error');
        }
    }

}
