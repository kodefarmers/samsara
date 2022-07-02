<div class="popup">
  <div class="popup-card">
    <form action="<?php echo URLROOT; ?>/todos/insert" method="post">
      <h2>Add Todo</h2>
      <div class="popup-card-title">
        <p>Title</p>
        <input type="text" name="title" id="" placeholder="Title" />
      </div>
      <div class="popup-card-body">
        <p>Description</p>
        <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
      </div>
      <div class="popup-card-remainder">
        <p>Set Remainder</p>
        <input type="datetime-local" name="remainder" id="">
      </div>
      <input class="btn btn-text btn-primary" type="submit" value="Save" />
    </form>
  </div>
</div>
