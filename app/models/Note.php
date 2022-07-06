<?php

class Note
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
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
