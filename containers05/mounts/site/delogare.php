<?php
  $cale = 'http://localhost/labs/Lab7final/';
	session_start();
    session_destroy();
    header('Location: '.$cale);
?>