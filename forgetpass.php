<?php

if (isset($_POST['email'])) {
    if((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
        User::forget_pass($_POST['email']);
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
