<?php

// Page Redirect
function redirect($page){
  header('location: ' . URLROOT . '/' . $page);
}
