<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<?php require APPROOT . '/views/includes/mainh.php'; ?>

<!-- Flash Message Div -->
<?php flash('todo_message') ?>
<div class="contents">
  <!-- Clock -->
  <div class="child contents-child1">
    <div class="child-head child1 card-head">
      <span class="card-head-title">child1</span>
    </div>
    <div class="child1-content">
      <div class="child-content-item">
      </div>
    </div>
  </div>
  <!-- Weather -->
  <div class="child contents-child2">
    <div class="child-head child2 card-head">
      <span class="card-head-title">child2</span>
    </div>
    <div class="child2-content">
      <div class="child-content-item">
      </div>
    </div>
  </div>
  <!-- TODO -->
  <div class="child contents-child3">
    <div class="child-head child3 card-head">
      <span class="card-head-title">todo</span>
      <button class="add add-todo btn btn-primary">
        <i class="uil uil-plus-square add-todo"></i>
      </button>
    </div>
    <div class="child3-content">
      <?php foreach ($data['tasks'] as $task) : ?>
        <div class="child-content-item">
          <div class="child-content-left">
            <input type="checkbox" onchange="updateTodoStatus(this)" data-checkbox-id="<?php echo $task->todoId ?>" <?php echo ($task->checked) ? "checked" : '' ?>>
          </div>
          <div class="child-content-middle">
            <span class="todo-task <?php echo ($task->checked) ? 'completed-task' : '' ?>" id="task-<?php echo $task->todoId ?>"> <?php echo $task->title ?> </span>
          </div>
          <div class="child-content-right">
            <button class="edit btn btn-success edit-todo">
              <i id="<?php echo $task->todoId ?>" class="uil uil-edit edit-todo"></i>
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
      <span class="card-head-title">notes</span>
      <button class="add add-note btn btn-primary">
        <i class="uil uil-plus-square add-note"></i>
      </button>
    </div>
    <div class="child4-content">
      <?php foreach ($data['notes'] as $note) : ?>
        <div class="child-content-item">
          <div class="child-content-left">
            <button class="btn btn-primary">
              <i class="uil uil-eye"></i>
            </button>
          </div>
          <div class="child-content-middle">
            <span class="" id="note-<?php echo $note->noteId ?>"> <?php echo ($note->title) ? substr($note->title, 0, 30) . '...' : substr($note->description, 0, 30) . '...'; ?> </span>
          </div>
          <div class="child-content-right">
            <button class="edit btn btn-success edit-note">
              <i id="<?php echo $note->noteId ?>" class="uil uil-edit edit-note"></i>
            </button>
            <form action="<?php echo URLROOT; ?>/todos/delete/<?php echo $note->noteId ?>" method="POST">
              <button class="btn btn-danger">
                <i class="uil uil-trash-alt"></i>
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- Hourly Weather -->
  <div class="child contents-child5">
    <div class="child-head child5 card-head">
      <span class="card-head-title">child2</span>
    </div>
    <div class="child5-content">
      <div class="child-content-item">
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/includes/mainf.php'; ?>
<?php require APPROOT . '/views/includes/popup-modal.php'; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>
