<?php
    require_once('user.php');
require_once('user_profil.php');
require_once ('config/setup.php');

    require_once('mymail.php');
    require_once('studio.php');


require_once ('header.php');
require_once ('nav.php');

if (isset($_GET) && isset($_GET['p']))
    $page = $_GET['p'];
else
    $page = 'home';
if ($page == 'home')
    require_once ('home.php');
else if ($page == 'post')
    require_once ('post.php');
else if ($page == 'signin')
    require_once ('signin.php');
else if ($page == 'signup')
    require_once ('signup.php');
else if ($page == 'studio')
    require_once ('add-pictures.php');
else if ($page == 'portfolio')
    require_once ('portfolio.php');
else if ($page == 'forgetpass')
    require_once ('forgetpass.php');
else if ($page == 'activateaccount')
    require_once ('activateaccount.php');
    else if ($page == 'setnewpass')
    require_once ('setnewpassword.php');
else if ($page == 'profil')
    require_once ('profil.php');
else
    print 'no page';

















require_once ('footer.php');



?>
