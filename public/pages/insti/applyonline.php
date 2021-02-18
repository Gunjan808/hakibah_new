<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Apply Online</h2>
                        <p>Home<span>/<span>Apply Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="apply_for_class">Class</label>
                            <div class="form-group">
                                <select name="apply_for_class" id="apply_for_class" class="w-100">
                                    <option selected hidden disabled>Apply For</option>
                                    <?php foreach (['5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th', '13th'] as $value) : ?>
                                        <option value="<?php is($value, 'show') ?>">
                                            <?php is($value, 'show'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="course_id">Course</label>
                            <div class="form-group">
                                <select name="course" id="course_id" class="w-100">
                                    <option selected hidden disabled>Apply For</option>
                                    <?php foreach (['IIT-JEE (Mains)', 'IIT-JEE (Mains + Adv.)', 'NEET/AIIMS', 'IIT (Pre-Foundation)'] as $value) : ?>
                                        <option value="<?php is($value, 'show') ?>">
                                            <?php is($value, 'show'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="study_center">Study Center</label>
                                <select name="study_center" id="study_center" class="w-100">
                                    <option selected hidden disabled>Apply For</option>
                                    <option value="online">Online</option>
                                    <option value="kota">Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="study_center">Medium of Study</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="English" name="medium" value="English" class="custom-control-input">
                                    <label class="custom-control-label" for="English">
                                        English
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hindi" name="medium" value="hindi" class="custom-control-input">
                                    <label class="custom-control-label" for="hindi">
                                        Hindi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="nick_name">Nick Name (Optional)</label>
                                <input type="text" class="form-control" id="nick_name" name="nick_name" placeholder="Enter Nick Name">
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="name1">Name</label>
                                <input type="hidden" name="current_url" value="<?php echo base_url(uri_string()); ?>">
                                <input type="text" class="form-control" id="name1" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="email1">Email</label>
                                <input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="tel" minlength="10" maxlength="10" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="blood_group">Blood Group (Optional)</label>
                                <input type="text" class="form-control" id="blood_group" name="blood_group">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" name="gender" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" name="gender" value="female" class="custom-control-input">
                                    <label class="custom-control-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="father_name">Father's Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="mother_name">Mother's Name</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name">
                            </div>
                        </div>


                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="father_occ">Father's Occupation</label>
                                <input type="text" class="form-control" id="father_occ" name="father_occ">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="p_address">Permanent Address</label>
                                <textarea class="form-control" name="p_address" id="p_address" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="c_address">Current Address</label>
                                <textarea class="form-control" name="c_address" id="c_address" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="pincode">Pincode</label>
                                <input type="number" minlength="6" maxlength="6" class="form-control" id="pincode" name="pincode">
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="resi_tel">Resi. Tel.</label>
                                <input type="text" class="form-control" id="resi_tel" name="resi_tel">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label for="tel_office">Tel. Father's Office</label>
                                <input type="text" class="form-control" id="tel_office" name="tel_office">
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="school_name">School Name where Studying Presently</label>
                                <input type="text" class="form-control" id="school_name" name="school_name">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="school_city">City where school is situatedy</label>
                                <input type="text" class="form-control" id="school_city" name="school_city">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="c_class">Class in Which studying as on date</label>
                                <input type="text" class="form-control" id="c_class" name="c_class">
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="form-group">
                                <label for="qualified">Are You NTSE/KVPY/IJSO</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="yes" name="qualified" value="yes" class="custom-control-input">
                                    <label class="custom-control-label" for="yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="no" name="qualified" value="no" class="custom-control-input">
                                    <label class="custom-control-label" for="no">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 mb-4">
                            <div class="form-group">
                                <label for="qualified_level">If Yes, upto level</label>
                                <input type="text" class="form-control" id="qualified_level" name="qualified_level">
                            </div>
                        </div>


                        <div class="col-md-3 mb-4">
                            <div class="form-group">
                                <label for="cast">Category</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="genral" name="cast" value="genral" class="custom-control-input">
                                    <label class="custom-control-label" for="genral">
                                        Genral
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="reserved" name="cast" value="reserved" class="custom-control-input">
                                    <label class="custom-control-label" for="reserved">
                                        Reserved
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 mb-4">
                            <div class="form-group">
                                <label for="cast_name">If Reserved, please specify</label>
                                <input type="text" class="form-control" id="cast_name" name="cast_name">
                            </div>
                        </div>

                        <div class="col-md-12 mb-4 collapse" id="tableShow">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Class</th>
                                        <th scope="col">Name of School</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Board</th>
                                        <th scope="col">Maths %</th>
                                        <th scope="col">Science %</th>
                                        <th scope="col">PCM/B %</th>
                                        <th scope="col">Aggr %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" id="class_name_1"></th>
                                        <td>
                                            <input type="hidden" id="class_1" name="class_1" class="form-control">
                                            <input type="text" id="school_name_1" name="school_name_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="year_1" name="year_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" id="board_1" name="board_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="maths_1" name="maths_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="science_1" name="science_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="pcmb_1" name="pcmb_1" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="aggr_1" name="aggr_1" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" id="class_name_2"></th>
                                        <td>
                                            <input type="hidden" id="class_2" name="class_2" class="form-control">
                                            <input type="text" id="school_name_2" name="school_name_2" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="year_2" name="year_2" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" id="board_2" name="board_2" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="maths_2" name="maths_2" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="science_2" name="science_2" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="pcmb_2" name="pcmb_2" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" id="aggr_2" name="aggr_2" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="competitive">Mention the performance of previous competitive examination, if any</label>
                                <textarea class="form-control" name="competitive" id="competitive" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            Declaration :
                            <ol>
                                <li>
                                    I hereby declare that if clear the selection test and join the institute by paying necessary fee and if withdraw from the course after the expiry of refund date. I will abide the refund rules of the institute.
                                </li>
                                <li>
                                    I hereby declare that the information provided by me in the Application Form are true and correct to the best of my knowledge.
                                </li>
                                <li>My signature below certifies that I have read, understood and agree to the all rules and regulation of the institute as given in instruction Manual and overleaf.
                                </li>
                                <li>
                                    If get selected in IITJEE the sole credit goes to First Prize only.
                                </li>
                                <li>
                                    All dispute are subjected to Kota (Rajasthan) Jurisdiction only.
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="modal-footer border-top-0 d-flex " style="justify-content: left;">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" id="signup-show" name="user_add" value="user_signup" class="btn_1">Sign Up</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->