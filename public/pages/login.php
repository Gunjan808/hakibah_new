<?php
// echo '<pre>';
// print_r($_SERVER);
// die();
?>
<style>
    .alert-span {
        color: red;
        font-size: 13px;
    }
</style>
<section class="bg-light">
    <div class="container">
        <div class="row mx-auto py-3">
            <div class="col-md-12 text-center mb-3">
                <h1 class="text-success font-weight-bold">Sign in</h1>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-3">Sign in with your email address</h5>
                        <form action="" method="post" id="signinForm">
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $redirect_url = explode("/hakibah/login/?", $url);
                            //$redirect_url = urldecode($redirect_url);
                            ?>
                            <input type="hidden" name="redirect" value="<?php echo (isset($redirect_url[1])) ? $redirect_url[1] : ''; ?>">
                            <div class="form-group">
                                <label for="email">E-mail Addresses<span style="color:#FF3300"><strong>*</strong></span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Addresses">
                                <span class="error-msg-email d-none alert-span">Please enter Email</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span style="color:#FF3300"><strong>*</strong></span></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <span class="error-msg-password d-none alert-span">Please enter Password</span>
                            </div>
                            <button type="button" name="userLogin" value="sdfdesf" id="userlogin_d" class="btn btn-block btn-primary">
                                Sign in
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Don't have an account ?
                            <a href="<?php echo SITE_URL; ?>register">
                                Get started for free!
                            </a>
                        </p>
                        <p>Forgot Password
                            <a href="<?php echo SITE_URL; ?>forgot-password">
                                Click Here
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>