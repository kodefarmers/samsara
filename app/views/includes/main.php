<main>
  <div class="container main__container">
    <div class="main__container-left">
      <div class="sidebar">
        <a class="sidebar-menuitem active">
          <span> <i class="uil uil-home"></i> </span>
        </a>
        <a class="sidebar-menuitem">
          <span> <i class="uil uil-stopwatch"></i> </span>
        </a>
        <a class="sidebar-menuitem">
          <span> <i class="uil uil-clipboard-notes"></i> </span>
        </a>
        <a class="sidebar-menuitem">
          <span> <i class="uil uil-diary"></i> </span>
        </a>
      </div>
    </div>
    <div class="main__container-right">
      <div class="contents">
        <!-- Clock -->
        <div class="child contents-child1">Child1</div>
        <!-- Weather -->
        <div class="child contents-child2">Child2</div>
        <!-- TODO -->
        <div class="child contents-child3">
          <div class="child3-head">
            <span>todo</span><button class="add"><i class="uil uil-plus-square"></i></button>
          </div>
          <div class="child3-content">
            <div class="child3-content-item1">
              <a>
                <span><i class="uil uil-check-circle"></i></span>
              </a> do dinner
              <a>
                <span><i class="uil uil-edit"></i></span>
              </a>
              <a>
                <span><i class="uil uil-trash-alt"></i></span>
              </a>
            </div>
          </div>
        </div>
        <!-- Notes -->
        <div class="child contents-child4">Child4</div>
        <!-- Hourly Weather -->
        <div class="child contents-child5">Child5</div>
      </div>
    </div>
  </div>
</main>
<?php
require_once 'popup-modal.php';
?>
