<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<?php require APPROOT . '/views/includes/mainh.php'; ?>

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Task</th>
      <th>Description</th>
      <th>Status</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach ($data['tasks'] as $task) : ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $task->title ?></td>
        <td><?php echo $task->description ?></td>
        <td><?php echo ($task->checked) ? 'Completed' : 'Not Completed' ?></td>
        <td>
          <div class="table-options">
            <button class="btn btn-primary view view-todo">
              <i id="<?php echo $task->todoId ?>" class="uil uil-eye view-todo"></i>
            </button>
            <button class="edit edit-todo btn btn-success">
              <i id="<?php echo $task->todoId ?>" class="uil uil-edit edit-todo"></i>
            </button>
            <form action="<?php echo URLROOT; ?>/todos/delete/<?php echo $task->todoId ?>" method="POST">
              <button class="btn btn-danger">
                <i class="uil uil-trash-alt"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    <?php $i++;
    endforeach; ?>
  </tbody>
</table>

<?php require APPROOT . '/views/includes/mainf.php'; ?>
<?php require APPROOT . '/views/includes/popup-modal.php'; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>
