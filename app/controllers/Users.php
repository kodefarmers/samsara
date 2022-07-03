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
        // Validated
        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {
          flash('register_success', 'You are registered and can now log in');
          redirect('users/login'); // Helper function
        } else {
          die('Something went wrong');
        }
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

      // Check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
      } else {
        $data['email_error'] = 'Email or password incorrect';
      }

      // Make sure errors are empty
      if (empty($data['email_error']) && empty($data['password_error'])) {
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);
        if ($loggedInUser) {
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_error'] = 'Incorrect Password';
          $this->view('users/login', $data);
        }
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

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_name'] = $user->name;
    $_SESSION['user_email'] = $user->email;
    redirect('');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    session_destroy();
    redirect('users/login');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
