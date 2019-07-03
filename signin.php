<?php
require_once('header.php');
if (get_user() == TRUE)
    header('Location: /cameraview.php');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>camagru</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php require_once ('database.php');
include __DIR__ . '/nav.php'; ?>
<?php
    if(isset($_POST['login']))
    {
        $login= (htmlspecialchars(addslashes($_POST['login'])));
        $passe1= (htmlspecialchars(addslashes($_POST['passe'])));
        $log = $database->prepare("SELECT login FROM users WHERE login = ? ");
        $log->bindValue(1, $login);
        $log->execute();
        $new_log= $log->fetch();
        $invalid_mdp = 0;
        if ($new_log[0] === $login)
        {
            $passe1 = hash('sha256', $passe1);
            $password = $database->prepare("SELECT password FROM users WHERE login = ? AND password = ? ");
            $password->bindValue(1, $login);
            $password->bindValue(2, $passe1);
            $password->execute();
            $new_pass = $password->fetch();
            $mail = $database->prepare("SELECT mail FROM users WHERE login = ?");
            $mail->bindValue(1, $login);
            $mail->execute();
            $new_mail = $mail->fetch();
            if ($new_pass[0] != $passe1)
            {
                $invalid_mdp = 1;
            }
            else
            {
                $_SESSION['login'] = $login;
                $_SESSION['mail'] = $new_mail[0];
                header('Location: /indexview.php');
            }

        }
    }
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-heading">
            <h2 class="text-center">log in</h2>
        </div>
        <hr />
        <div class="modal-body">
            <form method="post" role="form">
                <div class="form-group">
                    <div class="input-group"
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                    <input type="text" name="login" class="form-control" required placeholder="Login" />
                </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                <input type="password" name="passe" class="form-control" required placeholder="Password" />
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-lg">Login</button>
        </div>

        </form>
    </div>
</div>
</div>
</body>
</html>