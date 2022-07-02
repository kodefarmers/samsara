<?php
session_start();

// Flash message helper
// EXAMPLE - flash('register_success', 'You're now registered', 'alert alert-success');
// DISPLAY in view - <?php echo flash('register_success')

// $class will have our flash message css class
function flash($name = '', $message = '', $class = 'message-success')
{
  if (!empty($name)) {
    if (!empty($message) && empty($_SESSION[$name])) {

      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }

      if (!empty($_SESSION[$name . '_class'])) {
        unset($_SESSION[$name . '_class']);
      }

      $_SESSION[$name] = $message;
      $_SESSION[$name . '_class'] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) {
      $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
      echo '<div class="flash-div">
        <div class="flash-div-message ' . $class . '">' . $_SESSION[$name] . '</div>
      </div>';

      unset($_SESSION[$name]);
      unset($_SESSION[$name . '_class']);
    }
  }
}

// Above function explanation: Basically we are just storing session name as the key and then the message as the value
