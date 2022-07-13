<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<div id="background"></div>

<div class="form-wrapper">
  <?php flash('register_success') ?>
  <form class="entryform" action="<?php echo URLROOT; ?>/users/login" method="post">
    <div class="form-options">
      <!--  <label for="email">Email: <sup>*</sup></label> -->
      <input type="email" name="email" id="email" value="<?php echo $data['email']; ?>" placeholder="Your Email" />
    </div>
    <?php if (!empty($data['email_error'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['email_error'])) ? $data['email_error'] : ''; ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <!-- <label for="password">Password: <sup>*</sup></label> -->
      <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" placeholder="Your Password" />
    </div>
    <?php if (!empty($data['password_error'])) : ?>
      <div class="form-options">
        <span class="form-span"> <?php echo (!empty($data['password_error'])) ? $data['password_error'] : ''; ?> </span>
      </div>
    <?php endif; ?>
    <div class="form-options">
      <button class="entrybtn" type="submit">Login</button>
    </div>
    <div class="form-options">
    </div>
  </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
