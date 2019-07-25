<?php

if (User::get_user()== TRUE)
    header('Location: /profil.php');


if(isset($_POST['login'])) {

   User::connexion( $_POST['login'],$_POST['passe']);
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
        <div class="input-group">
                <a class="nav-link" href="/index.php?p=forgetpass">forget password</a>
        </div>


        </form>
    </div>
</div>
</div>
</body>
</html>