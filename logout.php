<?php
session_start();
// usuniecie zm. sesyjych
$_SESSION = array();
// i samej sesji
session_destroy();

?>