<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<?php require APPROOT . '/views/includes/mainh.php'; ?>

<div class="notes">
  <?php foreach ($data['notes'] as $note) : ?>
    <div class="note">
      <div class="note-title">
        <h4> <?php echo (strlen($note->title) > 26) ? substr($note->title, 0, 26) . '...' : $note->title ?> </h4>
        <span><?php echo date("M d, Y", strtotime($note->updated_at));  ?></span>
      </div>
      <div class="note-description">
        <p>
          <?php echo (strlen($note->description) > 220) ? substr($note->description, 0, 219) . '...' : $note->description  ?>
        </p>
      </div>
      <div class="note-options">
        <button class="btn btn-primary view view-note">
          <i id="<?php echo $note->noteId ?>" class="uil uil-eye view-note"></i>
        </button>
        </button>
        <button class="edit btn btn-success edit-note">
          <i id="<?php echo $note->noteId ?>" class="uil uil-edit edit-note"></i>
        </button>
        <button class="btn btn-danger delete delete-note">
          <i id="<?php echo $note->noteId ?>" class="uil uil-trash-alt delete-note"></i>
        </button>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php require APPROOT . '/views/includes/mainf.php'; ?>
<?php require APPROOT . '/views/includes/popup-modal.php'; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>
