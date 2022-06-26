<?php flash('register_success') ?>
<h2>Login</h2>
<p>Fill in the form below to login</p>
<form action="<?php echo URLROOT; ?>/users/login" method="post">
  <div class="form-options">
    <label for="email">Email: <sup>*</sup></label>
    <input type="email" name="email" id="email" value="<?php echo $data['email']; ?>" />
    <span> <?php echo (!empty($data['email_error'])) ?  $data['email_error'] : '';  ?> </span>
  </div>
  <div class="form-options">
    <label for="password">Password: <sup>*</sup></label>
    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" />
    <span> <?php echo (!empty($data['password_error'])) ?  $data['password_error'] : '';  ?> </span>
  </div>
  <div>
    <input type="submit" value="Login">
    Don't have an account? <a href="<?php echo URLROOT; ?>/users/register">Register</a>
  </div>
</form>
