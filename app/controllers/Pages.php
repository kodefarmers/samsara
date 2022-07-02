<?php
require_once 'Todos.php';

class Pages extends Controller
{
  private $todoControls = null;

  public function __construct()
  {
    $this->todoControls = new Todos();
  }

  // need this for our defaults
  public function index()
  {

    $tasks = $this->todoControls->getTodos();
    $data = [
      "tasks" => $tasks
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
