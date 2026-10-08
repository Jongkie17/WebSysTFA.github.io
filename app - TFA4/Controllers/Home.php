<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $today = date('Y-m-d');

        $tasks = $taskModel
            ->where('task_date', $today)
            ->findAll();

        return view('home', [
            'tasks' => $tasks,
            'today' => $today
        ]);
    }
}