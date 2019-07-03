<?php

session_start();

function get_user()
{
    if (isset($_SESSION['login']))
        return (TRUE);
    else
        return (FALSE);
}