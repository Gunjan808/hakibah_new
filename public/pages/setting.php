<?php is($data['user'], 'json') and $user = $data['user'] or show_404(); ?>

<section class="py-2 pt-4">
    <div class="container">
        <h2 class="text-secondary font-weight-bold">
            Settings
        </h2>
        <hr class="border-bottom mb-0">
    </div>
</section>

<section class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    <h4 class="text-secondary mb-3">Account</h4>

                    <div class="form-group">
                        <label for="first_name" class="text-secondary">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php is($user->first_name, 'show') ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="text-secondary">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php is($user->last_name, 'show') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php is($user->email, 'show') ?>">
                    </div>
                    <div class="form-group">
                        <label for="extra_email" class="text-secondary">Extra e-mail address</label>
                        <input type="email" class="form-control" name="extra_email" id="extra_email" value="<?php is($user->extra_email, 'show') ?>" placeholder="Extra e-mail address">
                    </div>
					<div class="form-group">
                        <label for="country">Region</label>
                        <select class="custom-select" id="country" name="country_id">
                            <?php if (is($data['countries'], 'array')) foreach ($data['countries'] as $country) : ?>
                                <option <?php check_selected_option($country->id, $user->country_id) ?> value="<?php is($country->id, 'show') ?>">
                                    <?php is($country->title, 'showCapital') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block" name="updateAccount" value="sdfsd">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    <h4 class="text-secondary mb-3">Study</h4>
                    <div class="form-group">
                        <label for="university_id">I study at</label>
                        <select class="form-control select2" name="university_id" id="university_id" data-live-search="true" title=" Select A University">
                            <option value="" hidden>Select A University</option>
                            <?php if (is($data['universities'], 'array')) foreach ($data['universities'] as $university) : ?>
                                <option <?php check_selected_option($university->id, $user->university_id) ?> value="<?php is($university->id, 'show') ?>">
                                    <?php is($university->title, 'showCapital') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="academicYear">I started studying in</label>
                        <select class="form-control withoutTagging " data-tags="true" data-placeholder="Select A Academic Year" name="academic_year" id="academicYear">
                            <option hidden value="">Select A Academic Year</option>
                            <?php for ($i = 0; $i < 16; $i++) : ?>
                                <option <?php check_selected_option(date('Y', strtotime('- ' . $i . ' year')), $user->academic_year) ?> value="<?php echo date('Y', strtotime('- ' . $i . ' year')) ?>">
                                    <?php echo date('Y', strtotime('- ' . $i . ' year')) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block" name="updateStudy" value="sdfsdf">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    <h4 class="text-secondary mb-3">Password</h4>
                    <div class="form-group">
                        <label for="c_pass" class="text-secondary">Current Password</label>
                        <input type="password" class="form-control" name="c_pass" id="c_pass">
                    </div>
                    <div class="form-group">
                        <label for="n_pass" class="text-secondary">New Password</label>
                        <input type="password" class="form-control" name="n_pass" id="n_pass">
                    </div>
                    <div class="form-group">
                        <label for="cn_pass" class="text-secondary">Confirm New Password</label>
                        <input type="password" class="form-control" name="cn_pass" id="cn_pass">
                    </div>
                    <button class="btn btn-primary btn-block" name="updatePassword" value="sdf">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    <h4 class="text-secondary mb-3">E-mail Settings</h4>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="title" class="custom-control-input saveCheck" id="saveEmail" >
                        <label class="custom-control-label" for="saveEmail">
                            I'm ok with receiving email about my uploads, recommendations, updates, promotions and more
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-2 my-4">
    <!--<div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    <h4 class="text-secondary mb-3">Linked accounts</h4>
                    <p>Through these linked accounts, you can log on using:</p>
                    <button class="btn btn-primary btn-block">Link Facebook</button>
                    <button class="btn btn-primary btn-block ">Link Google</button>
                </form>
            </div>
        </div>
    </div>-->
</section>

<section class="py-2 mb-4">
    <div class="container">
        <button class="btn btn-light border">
            Delete Account
        </button>
    </div>
</section>