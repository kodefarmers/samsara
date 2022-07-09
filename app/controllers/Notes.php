<?php

class Notes extends Controller
{
  public function __construct()
  {
    $this->noteModel = $this->model('Note');
  }

  public function index()
  {
    $notes = $this->noteModel->getNotes();
    $data = [
      'notes' => $notes
    ];

    $this->view('notes/index', $data);
  }

  public function getNotes()
  {
    // Get Notes
    $notes = $this->noteModel->getNotes();
    return $notes;
  }

  public function get($id)
  {
    $note = $this->noteModel->getSingleNote($id);

    echo json_encode(json_decode(json_encode($note), true));
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
      ];

      // Validate Inputs

      // Validate Descripton
      if (empty($data['description'])) {
        $data['description_error'] = 'Note cannot be empty';
      }

      if (empty($data['description_error'])) {
        // Validated
        // Insert Note
        if ($this->noteModel->insert($data)) {
          flash('message', 'Note Added Successfully');
          redirect(''); // Helper function
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with error
        redirect(''); // Helper function
        flash('message', 'Note cannot be empty', 'message-alert');
      }
    } else {
      // Init Data
      $data = [
        'title' => '',
        'description' => '',
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
      ];

      // Validate Inputs

      if (empty($data['description'])) {
        $data['description_error'] = 'Note cannot be empty';
      }

      if (empty($data['description_error'])) {
        // Validated
        // Insert Note
        if ($this->noteModel->edit($id, $data)) {
          flash('message', 'Note Edited Successfully');
          redirect(''); // Helper function
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with error
        redirect(''); // Helper function
        flash('message', 'Note cannot be empty', 'message-alert');
      }
    } else {
      // Init Data
      $data = [
        'title' => '',
        'description' => '',
        'description_error' => '',
      ];

      // Load view
      $this->view('', $data);
    }
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->noteModel->delete($id)) {
        flash('message', 'Note removed');
        redirect('');
      }
    } else {
      redirect('');
    }
  }
}
