<?php

class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function register()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process Form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init Data
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => ''
      ];

      // Validate Inputs

      // Validate Name
      if (empty($data['name'])) {
        $data['name_error'] = 'Please enter your name';
      }

      // Validate Email
      if (empty($data['email'])) {
        $data['email_error'] = 'Please enter your email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_error'] = 'Email is already taken';
        }
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_error'] = 'Please enter your password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_error'] = 'Password must be atleast 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_error'] = 'Please confirm your password';
      } else {
        if ($data['confirm_password'] != $data['password']) {
          $data['confirm_password_error'] = 'Passwords do not match';
        }
      }

      if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
        die('Success');
      } else {
        // Load view with error
        $this->view('users/register', $data);
      }
    } else {
      // Init Data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process Form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init Data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_error' => '',
        'password_error' => '',
      ];


      // Validate Email
      if (empty($data['email'])) {
        $data['email_error'] = 'Please enter your email';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_error'] = 'Please enter your password';
      }

      if (empty($data['email_error']) && empty($data['password_error'])) {
        die('Success');
      } else {
        $this->view('users/login', $data);
      }
    } else {
      // Init Data
      $data = [
        'email' => '',
        'password' => '',
        'email_error' => '',
        'password_error' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }
}
