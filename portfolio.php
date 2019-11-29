<?php

if (empty($_GET))
    header('Location: /index.php?p=portfolio');
if (User::get_user() == FALSE)
    header('Location: /signin.php');
?>
<?php
$database = myPDO::getdb();
?>
<?php

$id = studio::affpic();


?>
        <script src="js/delete.js"></script>
 <?php
    foreach ($id as $photo): ?>
          <div class='gallery' id="img-<?= $photo[0] ?>">
            <div class='mb-3 pics animation all 2'>
              <img class='img-fluid' onclick="delete_now(<?= $photo[0] ?>)" src="<?= $photo[1] ?>">
            </div>
          </div>
        <?php

    endforeach;
          if (isset($_POST['data'])) {

             studio::delpic($_POST['data']);
          }
        ?>