<?php
$this->display('C38_header.php');
$test = explode('=', $_SERVER["QUERY_STRING"]);
$page = '/help/' . $test[1] . '.php';
$this->display($page);
$this->display('C38_footer.php');
?>