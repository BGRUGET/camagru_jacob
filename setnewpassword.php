<?php


if (isset($_POST['pass']) && isset($_POST['pass2'])) {

    User::set_new_pass($_GET['email'], $_GET['token'], $_POST['pass'], $_POST['pass2']);

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
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg">SET NEW PASSWORD</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>