<nav>
  <div class="container nav__container">
    <h2 class="nav__container-logo">
      <i><?php echo strtolower(SITENAME); ?></i>
    </h2>
    <div class="nav__profile">
      <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="nav__profile-image">
          <img src="<?php echo URLROOT; ?>/img/avatar.png" alt="avatar" />
        </div>
        <div class="nav__profile-dropdown">
          <a class="dropdown">
            <span><i class="uil uil-setting"></i></span>
          </a>
          <div class="dropdown-contents">
            <a href="<?php echo URLROOT ?>/users/logout">Logout</a>
          </div>
        </div>
      <?php else : ?>
        <a class="btn btn-text btn-primary" href="<?php echo URLROOT; ?>/users/login">Login</a>
        <a class="btn btn-text btn-primary" href="<?php echo URLROOT; ?>/users/register">Register</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
