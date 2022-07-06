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
}
