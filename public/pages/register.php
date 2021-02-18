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
                <h1 class="text-success font-weight-bold">Let's get Started</h1>
                <h6>Register for free in 20 seconds</h6>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
				<style>
				#fname {
    display: none;
}</style>
                    <div class="card-body">
                        <h5 class="text-center mb-3">Sign up with your email address</h5>
                        <form action="" method="post" id="regForm">
                            <div id="first">
                                <div class="form-group">
                                    <label for="first_name">First Name<span style="color:#FF3300"><strong>*</strong></span></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                                    <span class="error-msg-f_name d-none alert-span">Please enter first name</span>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name<span style="color:#FF3300"><strong>*</strong></span></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                                    <span class="error-msg-l_name d-none alert-span">Please enter last name</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail Addresses<span style="color:#FF3300"><strong>*</strong></span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Addresses" required>
                                    <span class="error-msg-email d-none alert-span">Please enter email id</span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<span style="color:#FF3300"><strong>*</strong></span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    <span class="error-msg-password d-none alert-span">Please enter password</span>
                                </div>
                            </div>

                            <div id="sec" style="display:none">
                                <div class="form-group">
                                    <select class="form-control select2" name="university_id" id="university_id" data-live-search="true" title=" Select A University" required >
                                        <option value="" hidden>Select A University</option>
                                        <?php if (is($data['universities'], 'array')) foreach ($data['universities'] as $university) : ?>
                                            <option value="<?php is($university->id, 'show') ?>">
                                                <?php is($university->title, 'showCapital') ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control withoutTagging " data-tags="true" data-placeholder="Select A Academic Year" name="academic_year" id="academicYear" required >
                                        <option hidden value="">Select A Academic Year</option>
                                        <option value="<?php echo date('Y', time()) ?>/<?php echo date('Y', strtotime('+1 year')) ?>">
                                            <?php echo date('Y', time()) ?>/
                                            <?php echo date('Y', strtotime('+ 1 year')) ?>
                                        </option>
                                        <?php for ($i = 0; $i < 9; $i++) : ?>
                                            <?php $a = $i;
                                            $b = $i + 1 ?>
                                            <option value="<?php echo date('Y', strtotime('- ' . $b . ' year')) ?>/<?php echo date('Y', strtotime('- ' . $a . ' year')) ?>">
                                                <?php echo date('Y', strtotime('- ' . $b . ' year')) ?>/
                                                <?php echo date('Y', strtotime('- ' . $a . ' year')) ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                            </div>

						
                             <button id="userReg" type="button" name="userReg" value="sdfdesf" class="btn btn-block btn-primary">
                                Register
                            </button>

                           
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Already have an account ?
                            <a href="<?php echo SITE_URL; ?>login">Sign in here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</section>
