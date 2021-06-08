<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TaskModel;
        $data = $model->findAll();

        return view("Tasks/index", ['tasks' => $data]);
    }

    public function show($id)
    {
        $model = new \App\Models\TaskModel;

        $task = $model->find($id);

        return view('Tasks/show', [
            'task' => $task
        ]);
    }
    public function new()
    {
        return view('Tasks/new');
    }
    public function create()
    {
        $model = new \App\Models\TaskModel;

        $result = $model->insert([
            'description' => $this->request->getPost("description")
        ]);

        if ($result === false)
        {
              return redirect()->back()
                               ->with('errors', $model->errors())
                               ->with('warning', 'Invalid data');
        }else
        {
            return redirect()->to("/tasks/show/$result")
                             ->with('info', 'Task create sucessfuly');
        }
    }
    public function edit($id)
    {
        $model = new \App\Models\TaskModel;

        $task = $model->find($id);

        return view('Tasks/edit', [
            'task' => $task
        ]);
    }
    public function update($id)
    {
        $model = new \App\Models\TaskModel;
        $results = $model->update($id, [
            'description' =>   $this->request->getPost('description')
        ]);

        if ($results){
            return redirect()->to("/tasks/show/$id")
                         ->with('info', 'Description Updated');
        }else{
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('warning', 'Invalid data');
        }
    }

}
