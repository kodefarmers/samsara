<?php

class Note
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Fetch Note
  public function getSingleNote($id)
  {
    $this->db->query('SELECT * FROM notes where id = :id');
    $this->db->bind(':id', $id);
    $result = $this->db->getSingle();

    return $result;
  }

  // Fetch Notes
  public function getNotes()
  {
    $this->db->query('SELECT *,
                      notes.id as noteId,
                      users.id as userId
                      FROM notes
                      INNER JOIN users
                      ON notes.user_id = users.id
                      ORDER BY notes.created_at DESC');
    $results = $this->db->resultSet();
    return $results;
  }

  // Insert Note
  public function insert($data)
  {
    $this->db->query('INSERT INTO notes (user_id, title, description) VALUES (:userid, :title, :description)');

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
}
