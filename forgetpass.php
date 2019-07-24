<?php
require_once('header.php');
require_once ('database.php');
include __DIR__ . '/nav.php';

if (isset($_POST['email'])){
    $mail_link=(htmlspecialchars(addslashes($_POST['email'])));

    if((filter_var($mail_link, FILTER_VALIDATE_EMAIL))) {
        $check_mail = $database->prepare("SELECT mail, login FROM users WHERE mail = ? ");
        $check_mail->bindValue(1, $mail_link);
        $check_mail->execute();
        $info_db = $check_mail->fetch();
        if ($info_db[0] === $mail_link) {

            $cle = md5(microtime(TRUE)*1000000);
            $change_pass = $database->prepare("UPDATE users SET id_unique = ? WHERE mail = ?");
            $change_pass->bindValue(1, $cle);
            $change_pass->bindValue(2, $mail_link);
            $change_pass->execute();
            $to = $mail_link;
            $login = $info_db[1];
            $subject = 'New mail Camabelagruge';
            $message = ' hello ' . $login . ',
                            you are a bollos !!!!
                            
                         
                            Please click this link to change your password:
                            http://' . $_SERVER['HTTP_HOST'] . '/setnewpassword.php?email=' . $mail_link . '&hash=' . $cle . '';

            $headers = 'From:noreply@gmail.com' . "\r\n";
            mail($to, $subject, $message, $headers);
        }
    }
}
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-heading">
            <h2 class="text-center">forgetpass</h2>
        </div>
        <hr />
        <div class="modal-body">
            <form method="post" role="form">
        <div class="form-group">
            <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                    </span>
                <input type="text" name="email" class="form-control" required placeholder="Email" />

            </div>

        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-lg">SEND LINK</button>
        </div>

        </form>
    </div>
</div>
</div>
</body>
</html>
