
<?php
//if(isset($_POST['login'])) {
  //  user::set_profil('login');
//}



if(isset($_POST['fname'])) {
    profil::set_profil('fname', $_POST['fname']);
}
if(isset($_POST['lname'])) {
    profil::set_profil('lname', $_POST['lname']);
}
if(isset($_POST['phone'])) {
    profil::set_profil('phone', $_POST['phone']);
}
/*if(isset($_POST['pass']) && isset($_POST['pass2'])) {
    profil::set_new_pass($_POST['pass'], $_POST['pass2']);
}*/

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover">
                    <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
                    </div>
                    <div class="author-card-details">
                    <!--<div class="form-group">
                            <label for="account-fn">login</label>
                            <input class="form-control" type="text" id="account-log" placeholder="<?php //profil::get_profil('login')?>" >
                        </div> -->
                    <span class="author-card-position">Joined February 06, 2017</span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item" href="/index.php?p=myphoto">
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
            <form class="row" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-log">login</label>
                        <input class="form-control" type="text" id="account-fn" name="login" placeholder="<?php profil::get_profil('login')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" name="fname" placeholder="<?php profil::get_profil('fname')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" name="lname" placeholder="<?php profil::get_profil('lname')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email"  name="mail" placeholder="<?php profil::get_profil('mail')?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" id="account-phone" name="phone" placeholder="<?php profil::get_profil('phone')?>">
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
                        <div class="custom-control custom-checkbox d-block">
                            <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                            <label class="custom-control-label" for="like">like</label>
                            <label class="custom-control-label" for="comment">comment</label>
                        </div>
                        <button class="btn btn-style-1 btn-primary" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>