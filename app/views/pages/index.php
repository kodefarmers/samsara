<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>

<!-- Main Content -->
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
      <!-- Flash Message Div -->
      <?php flash('todo_message') ?>
      <div class="contents">
        <!-- Clock -->
        <div class="child contents-child1">
          <div class="child-head child1 card-head">
            <span class="card-head-title">child1</span>
          </div>
          <div class="child1-content">
            <div class="child1-content-item">
            </div>
          </div>
        </div>
        <!-- Weather -->
        <div class="child contents-child2">
          <div class="child-head child2 card-head">
            <span class="card-head-title">child2</span>
          </div>
          <div class="child2-content">
            <div class="child2-content-item">
            </div>
          </div>
        </div>
        <!-- TODO -->
        <div class="child contents-child3">
          <div class="child-head child3 card-head">
            <span class="card-head-title">todo</span>
            <button class="add btn btn-primary">
              <i class="uil uil-plus-square"></i>
            </button>
          </div>
          <div class="child3-content">
            <?php foreach ($data['tasks'] as $task) : ?>
              <div class="child3-content-item">
                <div class="child3-content-left">
                  <input type="checkbox" id="todo-checkbox-task<?php echo $task->todoId ?>" <?php echo ($task->checked) ? "checked" : '' ?> />
                </div>
                <div class="child3-content-middle">
                  <span class="todo-task" id="todo-task<?php echo $task->todoId ?>" style="text-decoration: <?php echo ($task->checked) ? 'line-through' : '' ?>; font-style: <?php echo ($task->checked) ? 'italic' : 'normal' ?>;"> <?php echo $task->title ?> </span>
                </div>
                <div class="child3-content-right">
                  <button class="btn btn-success">
                    <i class="uil uil-edit"></i>
                  </button>
                  <form action="<?php echo URLROOT; ?>/todos/delete/<?php echo $task->todoId ?>" method="POST">
                    <button class="btn btn-danger">
                      <i class="uil uil-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- Notes -->
        <div class="child contents-child4">
          <div class="child-head child4 card-head">
            <span class="card-head-title">child4</span>
          </div>
          <div class="child4-content">
            <div class="child4-content-item">
            </div>
          </div>
        </div>
        <!-- Hourly Weather -->
        <div class="child contents-child5">
          <div class="child-head child5 card-head">
            <span class="card-head-title">child2</span>
          </div>
          <div class="child5-content">
            <div class="child5-content-item">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once APPROOT . '/views/includes/popup-modal.php'; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>
