<h2>Create An Account</h2>
<p>Fill out the form below to register</p>
<form action="<?php echo URLROOT; ?>/users/register" method="post">
  <div class="form-options">
    <label for="name">Name: <sup>*</sup></label>
    <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" />
    <span> <?php echo (!empty($data['name_error'])) ?  $data['name_error'] : '';  ?> </span>
  </div>
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
  <div class="form-options">
    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
    <input type="password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>" />
    <span> <?php echo (!empty($data['confirm_password_error'])) ?  $data['confirm_password_error'] : '';  ?> </span>
  </div>
  <div>
    <input type="submit" value="Register">
    Have an account? <a href="<?php echo URLROOT; ?>/users/login">Login</a>
  </div>
</form>
