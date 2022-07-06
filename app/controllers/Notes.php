<?php

class Notes extends Controller
{
  public function __construct()
  {
    $this->noteModel = $this->model('Note');
  }

  public function index()
  {
  }

  public function getNotes()
  {
    // Get Notes
    $tasks = $this->noteModel->getNotes();
    return $tasks;
  }
}
