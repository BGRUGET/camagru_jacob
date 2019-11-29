
<?php
if (User::get_user() == FALSE)
    header('Location: /signin.php');
if (empty($_GET))
    header('Location: /index.php?p=profil');
if(!empty($_POST)) {
    if (!empty($_POST['fname'])) {
        profil::set_profil('fname', $_POST['fname']);
    }
    if (!empty($_POST['login'])) {
        profil::set_profil('login', $_POST['login']);
    }
    if (!empty($_POST['mail'])) {
        profil::set_profil('mail', $_POST['mail']);
    }
    if (!empty($_POST['lname'])) {
        profil::set_profil('lname', $_POST['lname']);
    }
    if (!empty($_POST['phone'])) {
        profil::set_profil('phone', $_POST['phone']);
    }
    if (!empty($_POST['pass'])) {
        if (!preg_match( '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,16}/', $_POST['pass'])) {
            echo 'mdp doit contenir au moins 1 maj && 1 min && 1 chiffre && entre 8 et 16 char ';}
        else if (!empty($_POST['pass2']))
        profil::set_new_pass($_POST['pass'], $_POST['pass2']);
    }
    $test = profil::get_profil('notif');

    if (!empty($_POST['check'])) {
        profil::set_notif($_POST['check']);
    } elseif( $test == 'checked'){
        profil::set_notif(NULL);
    }

    if (isset($_FILES) && isset($_FILES['pic']) && !empty($_FILES['pic']) && $_FILES['pic']['name'] ){
        profil::dl_pic($_FILES['pic']);
    }
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <form class="row" method="post" enctype="multipart/form-data">
            <div class="author-card pb-3">
                <div class="author-card-cover">
                    <div class="author-card-avatar">
                        <img name = "pic" src="<?= profil::get_profil('pic')?>" alt="<?= profil::get_profil('login')?>" height= "250" width="250" ">
                        <input type="file" name ="pic">
                    </div>

                <div class="author-card-details">
                    <div class="form-group">
                        <label for="account-fn">login</label>
                        <input class="form-control" type="text" id="account-log" name="login" placeholder= "login" value ="<?= profil::get_profil('login')?>" >
                    </div>
                    <span class="author-card-position">Joined on <?= profil::get_profil('date')?></span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item" href="/index.php?p=portfolio">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">My Photo</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    <a class="list-group-item" href="/index.php?p=mylike">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">My Like</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item" href="/index.php?p=mycomment">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">My Comment</div>
                            </div><span class="badge badge-secondary">4</span>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
             <div class = "row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" name="fname" placeholder= "First name" value ="<?= profil::get_profil('fname')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" name="lname" placeholder= " Last name" value ="<?= profil::get_profil('lname')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email"  name="mail" placeholder= "Mail" value ="<?= profil::get_profil('mail')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" id="account-phone" name="phone" placeholder= "phone" value ="<?= profil::get_profil('phone')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pass">New Password</label>
                        <input class="form-control" type="password" id="account-pass" name="pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pass2">Confirm Password</label>
                        <input class="form-control" type="password" id="account-confirm-pass" name="pass2">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="form-group form-check">
                            <input type="checkbox"  <?= profil::get_profil('notif')?> name ="check" class="form-check-input"  value="notif"/>notif<br>
                        </div>

                        <button class="btn btn-style-1 btn-primary" type="submit">Update Profile</button>
                    </div>
                </div>
             </div>
            </form>
        </div>
    </div>
</div>