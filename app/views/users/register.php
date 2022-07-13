<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div id="background"></div>

<div class="form-wrapper">
  <form class="entryform" action="<?php echo URLROOT; ?>/users/register" method="post">
    <div class="form-options">
      <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" placeholder="Your Name" />
    </div>
    <?php if (!empty($data['name_error'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['name_error'])) ?  $data['name_error'] : '';  ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <input type="email" name="email" id="email" value="<?php echo $data['email']; ?>" placeholder="Your Email" />
    </div>
    <?php if (!empty($data['email_error'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['email_error'])) ?  $data['email_error'] : '';  ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" placeholder="Password" />
    </div>
    <?php if (!empty($data['password_error'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['password_error'])) ?  $data['password_error'] : '';  ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <input type="password" name="confirm_password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>" placeholder="Confirm Password" />
    </div>
    <?php if (!empty($data['confirm_password_error'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['confirm_password_error'])) ?  $data['confirm_password_error'] : '';  ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <button class="entrybtn" type="submit">Register</button>
    </div>
  </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
