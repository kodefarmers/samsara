<?php

class Todos extends Controller
{
  public function __construct()
  {
    $this->todoModel = $this->model('Todo');
  }

  public function getTodos()
  {
    // Get Todos
    $tasks = $this->todoModel->getTodos();
    return $tasks;
  }
}
