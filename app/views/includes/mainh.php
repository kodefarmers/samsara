<!-- Main Content -->
<main>
  <div class="container main__container">
    <div class="main__container-left">
      <div class="sidebar">
        <a href="<?php echo URLROOT ?>/home" class="sidebar-menuitem<?php echo (CURPAGE == 'home') ? ' active' : NULL  ?>">
          <span> <i class="uil uil-home sidebar-menuitem-icon"></i> </span>
        </a>
        <a class="sidebar-menuitem open-timer">
          <span> <i class="uil uil-stopwatch sidebar-menuitem-icon open-timer"></i> </span>
        </a>
        <a href="<?php echo URLROOT ?>/todos" class="sidebar-menuitem<?php echo (CURPAGE == 'todos') ? ' active' : NULL ?>">
          <span> <i class="uil uil-clipboard-notes sidebar-menuitem-icon"></i> </span>
        </a>
        <a href="<?php echo URLROOT ?>/notes" class="sidebar-menuitem<?php echo (CURPAGE == 'notes') ? ' active' : NULL ?>">
          <span> <i class="uil uil-diary sidebar-menuitem-icon"></i> </span>
        </a>
      </div>
    </div>
    <div class="main__container-right">
