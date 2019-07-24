
<?php
    require_once ('database.php');
    myPDO::init_db("Camagru", "mysql", "root", "rootpass");

require_once ('header.php');
require_once ('nav.php');

if (isset($_GET) && isset($_GET['p']))
    $page = $_GET['p'];
else
    $page = 'home';
var_dump($GLOBALS['page']);
if ($page == 'home')
   echo' home';
else if ($page == 'signin')
    require_once ('signin.php');
else if ($page == 'signup')
    require_once ('signup.php');
else if ($page == 'camera')
    require_once ('camera.php');
else if ($page == 'forget')
    require_once ('forgetpass.php');
else if ($page == 'setnewpass')
    require_once ('setnewpassword.php');
else if ($page == 'profil')
    require_once ('profil.php');
else
    print 'no page';


















require_once ('footer.php');



?>
