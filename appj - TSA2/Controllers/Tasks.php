<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    // Public task list
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    // New task form
    public function new()
    {
        return view('task_form');
    }

    // Create task
    public function create()
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks');
    }

    // Edit form
    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to('/tasks');
        }

        return view('task_form', [
            'task' => $task
        ]);
    }

    // Update task
    public function update($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to('/tasks');
        }

        $rules = [
            'title' => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    // Soft delete
    public function delete($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to('/tasks');
        }

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks');
    }
}