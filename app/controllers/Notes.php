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
    $notes = $this->noteModel->getNotes();
    return $notes;
  }

  public function get($id)
  {
    $note = $this->noteModel->getSingleNote($id);

    echo json_encode(json_decode(json_encode($note), true));
  }
}
