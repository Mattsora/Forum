<?php

require'config.php';
var_dump($_SESSION);

session_destroy();
header('Location: index.php');
exit;