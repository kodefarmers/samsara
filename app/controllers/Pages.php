<?php

class Pages
{
  public function __construct()
  {
  }

  // need this for our defaults
  public function index()
  {
  }

  public function about($id)
  {
    echo $id;
  }
}
