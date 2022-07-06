<?php
require_once 'Todos.php';
require_once 'Notes.php';

class Pages extends Controller
{
  private $todoControls = null;
  private $noteControls = null;

  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    $this->todoControls = new Todos();
    $this->noteControls = new Notes();
  }

  // need this for our defaults
  public function index()
  {

    $tasks = $this->todoControls->getTodos();
    $notes = $this->noteControls->getNotes();

    $data = [
      "tasks" => $tasks,
      "notes" => $notes
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data =  [
      'title' => 'About'
    ];

    $this->view('pages/about', $data);
  }
}
