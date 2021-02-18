<style>
    .breadcrumb:after {
        background-color: #ffffff80;
    }
</style>
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg" style="background: url(<?php echo SITE_URL; ?>assets/insti/img/frn_6.JPG) center no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div style="vertical-align: bottom" class="breadcrumb_iner_item">
                        <!-- <h1>ACADEMIC PLANNING & MONITORING SUPPORT</h1> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<div class="col-md-12 text-center" style="margin-top: 100px;">
    <h1>Apply for Job</h1>
</div>

<div class="row" id="cancel-row" style="margin-bottom: 50px;">
    <div class="col-xl-8 col-lg-8 col-sm-8 col-md-8 offset-md-2  layout-spacing">
        <div class="widget-content widget-content-area br-6 shadow application-form">
            <form class="p-3" method="POST" enctype="multipart/form-data">
                <div id="MainCtn">
                    <div id="firstData" class="collapse show" aria-labelledby="headFirst" data-parent="#MainCtn">
                        <div class="card-body">
                            <!-- fullname -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name *" required>
                                        <small class="form-text text-muted">
                                            <span class="text-danger mr-1">*</span>Required Fields
                                        </small>
                                    </div>
                                </div>
                                <!-- mobile no. -->
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile *" minlength="10" maxlength="10" required>
                                        <small class="form-text text-muted">
                                            <span class="text-danger mr-1">*</span>Required Fields
                                        </small>
                                    </div>
                                </div>
                                <!-- mobile no. -->
                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email *" required>
                                        <small class="form-text text-muted">
                                            <span class="text-danger mr-1">*</span>Required Fields
                                        </small>
                                    </div>
                                </div>
                                <!-- email -->
                                <!-- apply for -->
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <select class="wide" name="job_id" id="job_id" data-live-search="true" title=" Select Category " placeholder="Designation*" required>
                                            <option value="" disabled selected>Select Job Type</option>
                                            <?php if (is($data)) foreach ($data as $value) : ?>
                                                <option value="<?php is($value->id, 'show'); ?>">
                                                    <?php is($value->title, 'showCapital'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-muted"><span class="text-danger mr-1">*</span>Required Fields</small>
                                    </div>
                                </div>
                                <!-- applyfor -->
                                <!-- experience -->
                                <div class="col-md-6">
                                    <div class="form-group mb-8">
                                        <select class="wide" name="experience" data-live-search="true" title="Experience" required>
                                            <option data-display="Experience">Nothing</option>
                                            <option value="Fresher">Fresher</option>
                                            <option value="1">1 Year</option>
                                            <option value="2">2 Year</option>
                                            <option value="3">3 Year</option>
                                            <option value="4">4 Year</option>
                                            <option value="5">5 Year</option>
                                            <option value="5">5+ Year</option>
                                            <option value="5+">More than 5year</option>
                                        </select>
                                        <small class="form-text text-muted"><span class="text-danger mr-1">*</span>Required Fields</small>
                                    </div>
                                </div>
                                <!-- experience -->
                                <!-- Qualification -->
                                <div class="col-md-6">
                                    <div class="form-group mb-8">
                                        <select class="wide" name="qualification" data-live-search="true" title="Qualification" required>
                                            <option data-display="Qualification">Nothing</option>
                                            <option value="TWELTH">12th</option>
                                            <option value="GRADUATION">Graduation</option>
                                            <option value="POST_GRADUATION">Post Graduation</option>
                                            <option value="PHD">PHD</option>
                                            <option value="DIPLOMA">Diploma</option>
                                            <option value="CERTIFICATE">Certificate</option>
                                            <option value="OTHER">Other</option>
                                        </select>
                                        <small class="form-text text-muted"><span class="text-danger mr-1">*</span>Required Fields</small>
                                    </div>
                                </div>
                                <!-- Qualification -->

                                <div class="col-md-12 collapse" id="subs">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-8">
                                                <select class="wide" name="category" data-live-search="true" title="Category">
                                                    <option data-display="Category">Nothing</option>
                                                    <option value="NEET/AIIMS">NEET/AIIMS</option>
                                                    <option value="JEE">JEE</option>
                                                    <option value="BOARD">Board</option>
                                                    <option value="PNCF">PNCF</option>
                                                </select>
                                                <small class="form-text text-muted">
                                                    <span class="text-danger mr-1">*</span>Required Fields
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-8">
                                                <input type="text" id="subject" name="subject" class="form-control " placeholder="Your Subject">
                                                <small class="form-text text-muted">
                                                    <span class="text-danger mr-1">*</span>Required Fields
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="pancard" id="pancard" class="form-control" placeholder="Pancard" required>
                                        <small class="form-text text-muted">
                                            <span class="text-danger mr-1">*</span>Required Fields
                                        </small>
                                    </div>
                                </div>

                                <!-- message -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="desc" id="desc" rows="3" name="message" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <!-- message -->
                                <!-- address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="desc" id="desc" rows="3" name="address" class="form-control" placeholder="Address" required></textarea>
                                        <small class="form-text text-muted">
                                            <span class="text-danger mr-1">*</span>Required Fields
                                        </small>
                                    </div>
                                </div>
                                <!-- address -->

                                <!-- resume -->
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <div class="custom-file">
                                            <input type="file" id="resume" name="resume" enctype="multipart/form-data" class="custom-file-input" id="customFile" required>
                                            <label class="custom-file-label" for="customFile">Choose Resume</label>
                                            <small class="form-text text-muted">
                                                <span class="text-danger mr-1">*</span>Required Fields
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- resume -->

                            <div class="col-md-4">
                                <button type="submit" name="apply" value="apply" class="btn btn-primary mt-4">APPLY</button>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <!-- Properties Filters -->
</div>
<!-- Properties Images -->
</div>
</div>
</div>
</div>