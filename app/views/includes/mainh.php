<!-- Main Content -->
<main>
  <div class="container main__container">
    <div class="main__container-left">
      <div class="sidebar">
        <a href="<?php echo URLROOT ?>/home" class="sidebar-menuitem<?php echo (CURPAGE == 'home') ? ' active' : NULL  ?>">
          <span> <i class="uil uil-home"></i> </span>
        </a>
        <a class="sidebar-menuitem">
          <span> <i class="uil uil-stopwatch"></i> </span>
        </a>
        <a href="<?php echo URLROOT ?>/todos" class="sidebar-menuitem<?php echo (CURPAGE == 'todos') ? ' active' : NULL ?>">
          <span> <i class="uil uil-clipboard-notes"></i> </span>
        </a>
        <a href="<?php echo URLROOT ?>/notes" class="sidebar-menuitem<?php echo (CURPAGE == 'notes') ? ' active' : NULL ?>">
          <span> <i class="uil uil-diary"></i> </span>
        </a>
      </div>
    </div>
    <div class="main__container-right">
