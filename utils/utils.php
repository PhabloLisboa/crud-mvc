<?php

function redirect($path ="", $feedback = null) {
  $_SESSION['feedback'] = $feedback;
  
  header("Location: http://".$_SERVER['SERVER_NAME'].$path.":".$_SERVER['SERVER_PORT']);
}