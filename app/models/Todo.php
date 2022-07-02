<?php

class Todo
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Fetch Todos
  public function getTodos()
  {
    $this->db->query('SELECT * FROM todos');
    $results = $this->db->resultSet();
    return $results;
  }
}
