<?php
if (empty($_GET))
    header('Location: /index.php?p=post');
require_once('user.php');
require_once('user_profil.php');
require_once('config/database.php');
require_once('config/setup.php');
require_once('mymail.php');
require_once('studio.php');
require_once('commentlike.php');
myPDO::init_db(DB_NAME, "mysql", "root", "rootpass");

require_once ('header.php');
require_once ('nav.php');
if (User::get_user() == FALSE)
    header('Location: /signin.php');
?>

<?php
   $database = myPDO::getdb();
  if (isset($_GET['id']))
  {

      $result_img = commentlike::get_image_home($_GET['id']);
  }

  if (!empty($_POST['comment'])){
    commentlike::post_comment($_SESSION['login'],$_GET['id'],$_POST['comment']);
    }
    if (!empty($_POST['like']))
    {
      $login = $_SESSION['login'];
      $id = $_GET['id'];
      $picture_like = $database->prepare("SELECT picture_like FROM like_button where login = ? AND picture_id = ?");
      $picture_like->bindValue(1, $login);
      $picture_like->bindValue(2, $id);
      $picture_like->execute();
      $result_like = $picture_like->fetch();
      $id_unique = $database->prepare("SELECT id_unique FROM pictures where id_unique = ?");
      $id_unique->bindValue(1, $id);
      $id_unique->execute();
      $result_id = $id_unique->fetch();
      $perso = $_SESSION['login'];
      if ($result_like[0] != '1')
      {
        $like = $database->prepare("INSERT INTO like_button VALUES('', ?, ?, '1')");
        $like->bindValue(1, $perso);
        $like->bindValue(2, $result_id[0]);
        $like->execute();
      }
      if ($result_like[0] == '1')
      {
        $delete = $database->prepare("DELETE FROM `like_button` WHERE picture_like = '1' AND login = ? AND picture_id = ?");
        $delete->bindValue(1, $login);
        $delete->bindValue(2, $id);
        $delete->execute();
      }
      header("Location: /post.php?id=".$_GET['id']);
    }

    $id = $_GET['id'];
    $nb_like = $database->prepare("SELECT count(*) as nb_likes FROM `like_button` WHERE `picture_id` = ?");
    $nb_like->bindValue(1, $id);
    $nb_like->execute();
    $result_nb = $nb_like->fetch();

?>
      <img class='img-fluid' id="help" src="<?= $result_img[0] ?>">
      <div>
        <form method="post" >
			<div class="form-group shadow-textarea">
				<br />
				<label for="exampleFormControlTextarea6">Espace commentaire</label>
				<textarea required maxlength="45" name="comment" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
				<input type="submit" name="submit" value="Send" id="submit"/>
			</div>
        </form>
        <form method="post" >
            <button class="btn btn-lg btn-primary btn-block" name="like" value="like" id="like" type="submit">Like</button>
            <p> Nombre de like = <?= $result_nb[0] ?></p>
        </form>
      </div>
      <?php
      $id = $_GET['id'];
      $insert = $database->prepare("SELECT commentaire, login, `mois`, `heure` FROM commentaire where picture_id = ? ORDER BY id DESC");
      $insert->bindValue(1, $id);
      $insert->execute();
      $result1 = $insert->fetchall();
      foreach ($result1 as $aff)
      {
		echo "
                    <hr>
                    <ul class='media-list'>
                        <li class='media'>
                            <a class='pull-left'>
                                <img src='https://bootdey.com/img/Content/user_1.jpg' alt='' class='img-circle'>
                            </a>
                            <div class='media-body'>
                                <span class='text-muted pull-right'>
                                    <small class='text-muted'>Le $aff[2] a $aff[3]</small>
                                </span>
                                <strong class='text-success'>$aff[1]</strong>
                                <p>
                                   $aff[0] </a>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>";
      }
	   ?>
