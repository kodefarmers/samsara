<!-- Main Content -->
<main>
  <div class="container main__container">
    <div class="main__container-left">
      <div class="sidebar">
        <a href="<?php echo URLROOT ?>/home" class="sidebar-menuitem<?php echo (CURPAGE == 'home') ? ' active' : NULL  ?>">
          <span> <i class="uil uil-home sidebar-menuitem-icon"></i> </span>
        </a>
        <a class="sidebar-menuitem popup-timer" id="timer-popup">
          <span> <i class="uil uil-stopwatch sidebar-menuitem-icon"></i> </span>
          <div class="timer-popup">
            <div class="timer">
              <pre>Timer</pre>
              <h4>09:10:11</h4>
              <div class="timer-controls">
                <i class="uil uil-pause"></i>
                <i class="uil uil-play"></i>
                <i class="uil uil-repeat"></i>
              </div>
            </div>
          </div>
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
