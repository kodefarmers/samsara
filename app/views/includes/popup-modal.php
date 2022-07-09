<div class="popup">
  <div class="popup-card">
    <form id="popup-form" action="<?php echo URLROOT; ?>/todos/insert" method="post">
      <h2 id="popup-card-heading"></h2>
      <div id="card-insert">
        <div class="popup-card-title">
          <p>Title</p>
          <input type="text" name="title" id="title" placeholder="Title" />
        </div>
        <div class="popup-card-body">
          <p>Description</p>
          <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
        </div>
        <div class="popup-card-remainder">
          <p>Set Remainder</p>
          <input type="datetime-local" name="remainder" id="datetime">
        </div>
        <input class="btn btn-text btn-primary" id="btn-save" type="submit" value="Save" />
      </div>
      <div id="card-delete">
        <p>Are you sure ? This cannot be undone.</p>
        <input class="btn btn-text btn-danger btn-delete" type="submit" value="Delete" />
        <button class="btn btn-text btn-success btn-cancel">Cancel</button>
      </div>
    </form>
  </div>
</div>
