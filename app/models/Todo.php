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
    $this->db->query('SELECT *,
                      todos.id as todoId,
                      users.id as userId
                      FROM todos
                      INNER JOIN users
                      ON todos.user_id = users.id
                      ORDER BY todos.created_at DESC');
    $results = $this->db->resultSet();
    return $results;
  }

  // Insert Todo
  public function insert($data)
  {
    $this->db->query('INSERT INTO todos (user_id, title, description) VALUES (:userid, :title, :description)');

    // Bind values
    $this->db->bind(':userid', $_SESSION['user_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);

    // Execute (INSERT, UPDATE, DELETE)
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id)
  {
    $this->db->query('DELETE FROM todos WHERE id = :id');

    $this->db->bind(':id', $id);

    // Execute (INSERT, UPDATE, DELETE)
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
