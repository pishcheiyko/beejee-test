<?php

namespace App\Controllers;

use App\Entities\Task;
use Src\Controller;

class FrontendController extends Controller
{
    /**
     * Index page (list of tasks)
     */
    public function index()
    {
        $task  = new Task($this->config);
        $tasks = $task->getAll();
        $amountOfTasks = $task->getAmountTasks();

        // load views.
        $this->view('task/list', [
            'tasks'         => $tasks,
            'amountOfTasks' => $amountOfTasks
        ]);
    }

    /**
     * Add task action
     */
    public function add()
    {
        if (isset($_POST['submit_add_task'])) {
            $task = new Task($this->config);
            $task->addTask([
                'userName' => $_POST['username'],
                'email'    => $_POST['email'],
                'comments' => $_POST['comments']
            ]);
            header('location: ' . $this->config['base_path']);
        } else {
            // load views.
            $this->view('task/add');
        }
    }

    /**
     * Edit task action
     * @param null $id
     */
    public function edit($id = null)
    {
        if ($this->isAdmin) {
            if (isset($_POST['submit_update_task'])) {
                $task = new Task($this->config);
                $task->updateTask([
                    'taskId'   => $_POST['id'],
                    'comments' => $_POST['comments'],
                    'status'   => isset($_POST['status']) && $_POST['status'] ? 1 : 0
                ]);
                header('location: ' . $this->config['base_path']);
            } elseif (isset($id) && $id) {
                $task = new Task($this->config);
                $task = $task->getTask($id);

                if ($task === false) {
                    $this->view('task/error', []);
                } else {
                    // load views.
                    $this->view('task/edit', [
                        'task' => $task
                    ]);
                }
            } else {
                header('location: ' . $this->config['base_path']);
            }
        } else {
            header('location: ' . $this->config['base_path']);
        }
    }
}