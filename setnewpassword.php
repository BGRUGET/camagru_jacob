<?php

require_once('header.php');
require_once('database.php');
include __DIR__ . '/nav.php';

if (isset($_POST['passe1']) && isset($_POST['passe2'])) {
    $valid_cle = 0;
    $valid_mail = 0;
    $mail_link = (htmlspecialchars(addslashes($_GET['email'])));
    $cle_link = (htmlspecialchars(addslashes($_GET['hash'])));
    $passe1 = (htmlspecialchars(addslashes($_POST['passe1'])));
    $passe2 = (htmlspecialchars(addslashes($_POST['passe2'])));
    $invalid_pass = 0;
    $valid_pass = 0;

    $check_mail = $database->prepare("SELECT mail FROM users WHERE mail = ? ");
    $check_mail->bindValue(1, $mail_link);
    $check_mail->execute();
    $mail_db = $check_mail->fetch();
    if ($mail_db[0] === $mail_link) {
        $valid_mail = 1;
    }
    $cle = $database->prepare("SELECT id_unique FROM users WHERE mail = ? ");
    $cle->bindValue(1, $mail_link);
    $cle->execute();
    $cle_db = $cle->fetch();
    if ($cle_db[0] === $cle_link) {
        $valid_cle = 1;
    }

    if ($passe1 != $passe2)
        $valid_pass = 1;
    if ($passe1 == $passe2) {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,20}$/', $passe1))
            $invalid_pass = 1;
        $passe1 = hash('sha256', $passe1);
    }
    if ($valid_mail == 1 && $valid_cle == 1 && $valid_pass == 0 && $invalid_pass == 0) {
        $activate = $database->prepare("UPDATE users SET password = ?, id_unique = '' WHERE mail = ?");
        $activate->bindValue(2, $mail_link);
        $activate->bindValue(1, $passe1);
        $activate->execute();

        header('Location: /signin.php');

    }
}
?>
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-heading">
            <h2 class="text-center"> NEW PASSWORD</h2>
        </div>
        <div class="modal-body">
            <form method="post" role="form">
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                    </span>
                        <input type="password" name="passe1" class="form-control" required placeholder="Password" />
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
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg">SET NEW PASSWORD</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>