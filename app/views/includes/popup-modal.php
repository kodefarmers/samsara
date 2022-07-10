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
    <div class="timer-popup">
      <div class="timer">
        <pre style="margin-bottom: 0.9rem;">Timer</pre>
        <div class="timer-input">
          <input type="number" name="hour" max="99" min="0" id="h" value="0">:
          <input type="number" name="min" max="60" min="0" id="m" value="0">:
          <input type="number" name="sec" max="60" min="0" id="s" value="0">
        </div>
        <div class="timer-controls">
          <button class="btn btn-primary" id="pause">
            <i class="uil uil-pause"></i>
          </button>
          <button class="btn btn-primary" id="play">
            <i class="uil uil-play"></i>
          </button>
          <button class="btn btn-primary" id="reset">
            <i class="uil uil-stop-circle"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
