<?php
/*
 * Base Controller class
 * Loads the models and views
 */
class Controller
{
  // load model
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';

    // instantiate model
    return new $model();
  }

  //load view
  public function view($view, $data = [])
  {
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      die('View does not exist');
    }
  }
}
