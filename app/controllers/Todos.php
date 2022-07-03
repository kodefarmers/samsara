<?php

class Todos extends Controller
{
  public function __construct()
  {
    $this->todoModel = $this->model('Todo');
  }

  public function index()
  {
  }

  public function getTodos()
  {
    // Get Todos
    $tasks = $this->todoModel->getTodos();
    return $tasks;
  }

  public function insert()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process Form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init Data
      $data = [
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'remainder' => trim($_POST['remainder']),
      ];

      // Validate Inputs

      // Validate Title
      if (empty($data['title'])) {
        $data['title_error'] = 'Task cannot be empty';
      }

      if (empty($data['title_error'])) {
        // Validated
        // Insert Todo
        if ($this->todoModel->insert($data)) {
          flash('todo_add_success', 'Todo Added Successfully');
          redirect('pages/index'); // Helper function
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with error
        redirect('pages/index'); // Helper function
        flash('todo_add_error', 'Todo title cannot be empty', 'message-alert');
      }
    } else {
      // Init Data
      $data = [
        'title' => '',
        'description' => '',
        'remainder' => '',
        'title_error' => '',
      ];

      // Load view
      $this->view('pages/index', $data);
    }
  }

  public function edit($id)
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process Form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init Data
      $data = [
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'remainder' => trim($_POST['remainder']),
      ];

      // Validate Inputs

      // Validate Title
      if (empty($data['title'])) {
        $data['title_error'] = 'Task cannot be empty';
      }

      if (empty($data['title_error'])) {
        // Validated
        // Insert Todo
        if ($this->todoModel->edit($id, $data)) {
          flash('todo_message', 'Todo Edited Successfully');
          redirect(''); // Helper function
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with error
        redirect('pages/index'); // Helper function
        flash('todo_add_error', 'Todo title cannot be empty', 'message-alert');
      }
    } else {
      // Init Data
      $data = [
        'title' => '',
        'description' => '',
        'remainder' => '',
        'title_error' => '',
      ];

      // Load view
      $this->view('', $data);
    }
  }

  public function get($id)
  {
    $task = $this->todoModel->getSingleTodo($id);

    /* print_r($task); */
    echo json_encode(json_decode(json_encode($task), true));
  }

  public function check($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->todoModel->check($id)) {
        flash('todo_message', 'Todo task checked');
        redirect('pages/index');
      }
    } else {
      redirect('pages/index');
    }
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->todoModel->delete($id)) {
        flash('todo_message', 'Todo task removed');
        redirect('pages/index');
      }
    } else {
      redirect('pages/index');
    }
  }
}
