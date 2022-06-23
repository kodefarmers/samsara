<?php

class Pages extends Controller
{
  public function __construct()
  {
  }

  // need this for our defaults
  public function index()
  {
    /* $this->view('hello'); */
  }

  public function about($id)
  {
    echo $id;
  }
}
