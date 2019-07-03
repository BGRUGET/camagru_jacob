
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>camagru</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
require_once('header.php');
require_once ('database.php');
    include __DIR__ . '/nav.php';
if (get_user() == TRUE)
    header('Location: /cameraview.php');
?>
<?php
    if (isset($_POST['login']))
        {
            $len_login=0;
            $login_existing = 0;
            $valid_mail = 0;
            $mail_existing = 0;
            $invalid_pass = 0;
            $valid_pass = 0;
            $login= (htmlspecialchars(addslashes($_POST['login'])));
            $mail= (htmlspecialchars(addslashes($_POST['email'])));
            $passe1= (htmlspecialchars(addslashes($_POST['passe'])));
            $passe2= (htmlspecialchars(addslashes($_POST['passe2'])));
            if((strlen($login) < 3) || (strlen($login) > 12)) //LOGIN
                $len_login = 1;
            $log = $database->prepare("SELECT login FROM users WHERE login = ? ");
            $log->bindValue(1, $login);
            $log->execute();
            $res_login = $log->fetch();
            if ($res_login[0] === $login)
                $login_existing = 1; //ENDLOGIN
            if (!(filter_var($mail, FILTER_VALIDATE_EMAIL)))
                $valid_mail=1;
            $log_mail = $database->prepare("SELECT mail FROM users WHERE mail =?");
            $log_mail->bindValue(1, $mail);
            $log_mail->execute();
            $new_mail = $log_mail->fetch();
            if($new_mail[0] === $mail)
                $mail_existing = 1;
            if ($passe1 != $passe2)
                $valid_pass = 1;
            if ($passe1 == $passe2)
            {
                if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,20}$/', $passe1))
                    $invalid_pass =1;
                $passe1 = hash('sha256', $passe1);
            }
            if ($len_login==0 && $login_existing == 0 && $valid_mail == 0 && $mail_existing == 0  && $invalid_pass == 0  && $valid_pass == 0)
            {
                $cle = md5(microtime(TRUE)*1000000);
                $sign_up = $database->prepare("INSERT INTO users VALUE('',?,?,?,?)");
                $sign_up->bindValue(1, $login);
                $sign_up->bindValue(2, $passe1);
                $sign_up->bindValue(3, $mail);
                $sign_up->bindValue(4, $cle);
                $sign_up->execute();
            }

        }
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-heading">
            <h2 class="text-center">Register</h2>
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
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                        <input type="password" name="passe2" class="form-control"required placeholder="Password confirmation" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                    </span>
                        <input type="text" name="email" class="form-control" required placeholder="Email" />

                    </div>

                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>