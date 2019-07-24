<?php
session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>camagru</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>



<?php
function get_user()
{
    if (isset($_SESSION['login']))
        return (TRUE);
    else
        return (FALSE);
}
require_once ('nav.php');

?>