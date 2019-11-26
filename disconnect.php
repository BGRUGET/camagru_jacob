<?php
if (empty($_GET))
    header('Location: /index.php?p=home');
session_start();
session_destroy();

header('Location: /index.php');
?>