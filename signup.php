
<?php

if (User::get_user() == TRUE)
    header('Location: /index.php?p=profil');
?>
<?php
    if(isset($_POST['login'])){

        User::register($_POST['login'], $_POST['fname'], $_POST['lname'],$_POST['email'],$_POST['pass'],$_POST['pass2']);
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
                        <input type="text" name="login" class="form-control" required placeholder="Login" pattern="[A-Za-z]{3,12}" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                            </span>
                        <input type="text" name="fname" class="form-control" required placeholder="First Name" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                            </span>
                        <input type="text" name="lname" class="form-control" required placeholder="Last Name" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                        <input type="password" name="pass" class="form-control" required placeholder="Password" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                        <input type="password" name="pass2" class="form-control"required placeholder="Password confirmation" />
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
<?php
/*  $len_login=0;
$login_existing = 0;
$valid_mail = 0;
$mail_existing = 0;
$invalid_pass = 0;
$valid_pass = 0;
$login= (htmlspecialchars(addslashes($_POST['login']))); // html.. pas forcement obligatoire
$mail= (htmlspecialchars(addslashes($_POST['email'])));
$passe1= (htmlspecialchars(addslashes($_POST['passe'])));
$passe2= (htmlspecialchars(addslashes($_POST['passe2'])));

$log = $database->prepare("SELECT login FROM users WHERE login = ? ");
$log->bindValue(1, $login);
$log->execute();
$res_login = $log->fetch();
if ($res_login[0] === $login)
$login_existing = 1; //ENDLOGIN
if (!(filter_var($mail, FILTER_VALIDATE_EMAIL))) // Check MAIL
$valid_mail=1;
$log_mail = $database->prepare("SELECT mail FROM users WHERE mail =?");
$log_mail->bindValue(1, $mail);
$log_mail->execute();
$new_mail = $log_mail->fetch();
if($new_mail[0] === $mail)
$mail_existing = 1; // ENDMAIL
if ($passe1 != $passe2) // CHECK pase
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
$sign_up = $database->prepare("INSERT INTO users VALUE('',?,?,?,?,'0')");
$sign_up->bindValue(1, $login);
$sign_up->bindValue(2, $mail);
$sign_up->bindValue(3, $passe1);
$sign_up->bindValue(4, $cle);
$sign_up->execute();
$to = $mail;
$subject = 'Check mail Camabelgruge';
$message = ' hello '.$login.',
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
------------------------
Username: '.$login.'
------------------------

Please click this link to activate your account:
http://'.$_SERVER['HTTP_HOST'].'/activateaccount.php?email='.$mail.'&hash='.$cle.'';

$headers = 'From:noreply@gmail.com' . "\r\n";
mail($to, $subject, $message, $headers);
}

}*/
?>