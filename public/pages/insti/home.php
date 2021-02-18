<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>
                            Join <span class="high_light_text">First Prize</span> Today
                        </h5>
                        <h1>To become IITian/Doctor Tomorrow</h1>
                        <p>Change is constant in JEE. That’s never been more true than it is right now. It’s why we work so hard to provide a curriculum and an experience that leaves our students prepared for just anything.</p>
                        <a href="<?= SITE_URL . 'courses' ?>" class="btn_1">View Courses </a>
                        <a href="#" id="download-btn" class="btn_2">Get Started </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1>Our Methodology</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xl-4 align-self-center mb-5">
                <h3 class="mb-5">Latest News</h3>
                <div class="single_feature_text" style="height: 362px;overflow-y:scroll">
                    <ul>
                        <?php if (is($data['latestnews'])) foreach ($data['latestnews'] as $news) : ?>
                            <li class="bg-white rounded-lg py-2 px-3 mb-3 mx-3">
                                <a href="<?php echo SITE_URL; ?>news/<?php is($news->slug, 'show'); ?>">
                                    <h5 class="text-lead">
                                        <?php is($news->title, 'showCapital'); ?>
                                    </h5>
                                    <p>
                                        <?php is($news->short_description, 'showCapital'); ?>
                                    </p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-5">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-layers"></i></span>
                        <h4>Pre-defined Yearly Planner</h4>
                        <p>Students are provided with a yearly planner consisting of arrayed
                            chapters for each of the subjects, test grid of the whole session with
                            syllabus mentioned in it, holiday schedule, homework checking
                            schedule etc. This planner helps students and parents in planning the
                            strategy for studies and progress ahead.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-5">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                        <h4>All India Testing</h4>
                        <p>Students are provided with a yearly planner consisting of arrayed
                            chapters for each of the subjects, test grid of the whole session with
                            syllabus mentioned in it, holiday schedule, homework checking
                            schedule etc. This planner helps students and parents in planning the
                            strategy for studies and progress ahead.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-5">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                        <h4>Scientifically Designed Chapter Modules</h4>
                        <p>Students are provided with a yearly planner consisting of arrayed
                            chapters for each of the subjects, test grid of the whole session with
                            syllabus mentioned in it, holiday schedule, homework checking
                            schedule etc. This planner helps students and parents in planning the
                            strategy for studies and progress ahead.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-5">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-ruler-pencil"></i></span>
                        <h4>Daily Practice Problems<br> (DPPs)</h4>
                        <p>Students are provided with a yearly planner consisting of arrayed
                            chapters for each of the subjects, test grid of the whole session with
                            syllabus mentioned in it, holiday schedule, homework checking
                            schedule etc. This planner helps students and parents in planning the
                            strategy for studies and progress ahead.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-5">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-user"></i></span>
                        <h4>Awesome Feature</h4>
                        <p><i class="ti-control-play"></i>&nbsp;Only 41 students in a batch.</p>
                        <p><i class="ti-control-play"></i>&nbsp;Highly experienced faculty team for all subjects. (Phy, Chem, math, Bio, S.St., Eng. Hindi, Mental Ability)</p>
                        <p><i class="ti-control-play"></i>&nbsp;Exclusive NTSE, IJSO, KVPY, IESO, GIIS, SIA & SAT Batches</p>
                        <p><i class="ti-control-play"></i>&nbsp;Preparation for admission in abroad universities.</p>
                        <p><i class="ti-control-play"></i>&nbsp;Parent Teacher & Student Meeting.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- learning part start-->
<section class="learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-lg-stretch">
            <div class="col-md-6 col-lg-6">
                <div class="learning_img">
                    <img src="<?= SITE_URL ?>assets/insti/img/about.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text">
                    <h2>About us</h2>
                    <p>Founded as a small institute in the Kota District of Rajasthan, now a team work at First Prize Kota and its different Study Centers across the India, the agships for our 84+ campuses. All these people in different cities now work in unison to ignite and give a spark to the dreams of thousands of our students countrywide. First Prize was established on 5th April 2018 with a vision to attain excellence in career education.</p>
                    <a href="<?php echo SITE_URL; ?>about-us" class="btn_1 mt-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- learning part end-->


<!--::review_part start::-->
<?php if (is($data['courses'])) : ?>
    <section class="special_cource ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['courses'] as $key => $course) : ?>
                    <div class="col-sm-6 col-lg-3 mb-5">
                        <div class="single_special_cource">
                            <img src="<?= $course['post_image'] ?>" class="special_img" alt="">
                            <div class="special_cource_text">
                                <div class="row">

                                    <div class="col-md-12">
                                        <a href="<?php echo SITE_URL; ?>course/<?php is($course['slug'], 'show') ?>" class="btn_4 mb-3 px-1 py-1"><?= get_title('categories', $course['category_id']) ?></a>
                                        <a href="<?php echo SITE_URL; ?>course/<?php is($course['slug'], 'show') ?>">
                                            <h3 style="margin-top: 0px;"><?= $course['title'] ?></h3>
                                        </a>
                                    </div>
                                    <div class="col-md-12 mt-3">

                                        <?= is($course['regular_price']) ? '<h5 style="float: left; text-align:left;"><strike>Rs. ' . $course['regular_price'] . '/- </strike>&nbsp;&nbsp;&nbsp;&nbsp;</h5>' : ''  ?>
                                        <h4 style="float: left; text-align:left; margin-top:-3px">
                                            <?= is($course['sale_price']) ? 'Rs. ' . $course['sale_price'] . '/- ' : 'FREE'  ?>
                                        </h4>

                                    </div>
                                </div>
                                <p><?= $course['short_description'] ?></p>
                                <!-- <div class="author_info">
                                    <a href="<?= SITE_URL . 'course/' . $course['slug'] ?>" class="btn_4 download-btn">Enroll Now </a>
                                    <div class="author_img">
                                        <img src="<?= $course['post_image'] ?>" alt="">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5><a href="#">James Well</a></h5>
                                        </div>
                                    </div>
                                    <div class="author_rating">
                                        <div class="rating">
                                            <a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
                                            <a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
                                        </div>
                                        <p>3.8 Ratings</p>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- revie part end -->

<!-- learning part start-->
<section class="advance_feature learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch mb-1">
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text pt-3">
                    <h5>Advance feature</h5>
                    <h2>Our Advance Educator Learning System</h2>
                    <p>Life is a journey of thousand miles. To make this journey happy and peaceful, the surest way is via a successful career. An illustrious career is made possible by taking steps in right direction at right time.
                    </p>
                    <p>Aagman is one such a step, that every student should take today. This methodology program will identify the potential within you and take all necessary steps to ensure that this talent is encouraged, till it reaches the heights it is destined for.</p>
                    <p>Aagman is a comprehensive program, which awards you now and also keep on supporting you for the entire duration of your schooling and development of student idea in research and scientific approach. </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="learning_img">
                    <img src="<?= SITE_URL ?>assets/insti/img/learning.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
                <div class="learning_member_text_iner">
                    <span class="ti-pencil-alt"></span>
                    <h4>STUDY MATERIAL</h4>
                    <p>What to study and how to study are two major questions a student has in his mind when he starts the preparation for any exam. The other major issue is
                        where the student will search for the comprehensive
                        content to prepare Keeping these concerns in mind
                        our faculties have designed a comprehensive course
                        material which comprises of theory, key concepts,
                        illustrations, practice sheets and tests. </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
                <div class="learning_member_text_iner">
                    <span class="ti-star"></span>
                    <h4>BEST TEAM FOR ALL STUDENTS</h4>
                    <p>Hear at First Prize, our Studentslearn to live in competition.
                        Structured curriculum helps them to achieve individual
                        goals while involving them in valuable competition</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
                <div class="learning_member_text_iner">
                    <span class="ti-stamp"></span>
                    <h4>EXPERT FACULTY</h4>
                    <p>Faculty is one of the strongest pillars for an education
                        institution. At First Prize we have a team of dedicated
                        and experienced faculties. The whole country is
                        obsessed with Senior Faculty of kota this itself is a
                        symbol of the best faculty pool at First Prize. Our
                        faculties play a vital role in designing the curriculum
                        and study material with constant research. </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- learning part end-->
<style>
    #owl-demo .item img {
        display: block;
        width: 100%;
        height: auto;
    }
</style>
<section>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php if (is($data) and is($data['slider'])) foreach ($data['slider'] as $slider) : ?>
            <div class="item">
                <img src="<?php is($slider->image, 'show') ?>" class="d-block w-100" alt="...">
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- member_counter counter start -->
<section class="member_counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">1024</span>
                    <h4>All Teachers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">960</span>
                    <h4> All Students</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">1020</span>
                    <h4>Online Students</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">820</span>
                    <h4>Ofline Students</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- member_counter counter end -->

<!--::review_part start::-->
<section class="testimonial_part">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>tesimonials</p>
                    <h2>Happy Students</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    <?php if (is($data) and is($data['testimonials'])) foreach ($data['testimonials'] as $testimonial) : ?>
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p><?php is($testimonial->short_description, 'showCapital'); ?></p>
                                        <h4><?php is($testimonial->title, 'showCapital'); ?></h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="<?php is($testimonial->post_image, 'show'); ?>" alt="fsdfs">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p><?php is($testimonial->short_description, 'showCapital'); ?></p>
                                        <h4><?php is($testimonial->title, 'showCapital'); ?></h4>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="<?php is($testimonial->post_image, 'show'); ?>" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::blog_part end::-->

<!--::blog_part start::-->
<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Our Blog</p>
                    <h2>Students Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (is($data['blogs'])) foreach ($data['blogs'] as $blog) : ?>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog    ">
                        <div class="card">
                            <img src="<?php is($blog->post_image, 'show'); ?>" class="card-img-top" alt="<?php is($blog->slug, 'show'); ?>">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="btn_4">
                                    <?php is($blog->category_title, 'showCapital'); ?>
                                </a>
                                <a href="<?php echo SITE_URL . 'blog/' . $blog->slug; ?>">
                                    <h5 class="card-title">
                                        <?php is($blog->title, 'showCapital'); ?>
                                    </h5>
                                </a>
                                <p>
                                    <?php is($blog->short_description, 'show'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--::blog_part end::-->

<section class="container">
    <div class="row text-center">
        <div class="col-md-2 py-3">
            <img class="w-50" src="<?php echo SITE_URL; ?>assets/insti/img/visa.png" alt="">
        </div>
        <div class="col-md-2 py-3">
            <img class="w-50" src="<?php echo SITE_URL; ?>assets/insti/img/master.png" alt="">
        </div>
        <div class="col-md-2 py-3">
            <img class="w-50" src="<?php echo SITE_URL; ?>assets/insti/img/mestro.png" alt="">
        </div>
        <div class="col-md-2 py-3">
            <img class="img-fluid mt-2" src="<?php echo SITE_URL; ?>assets/insti/img/icici.png" alt="">
        </div>
        <div class="col-md-2 py-3">
            <img class="w-50" src="<?php echo SITE_URL; ?>assets/insti/img/paypal.png" alt="">
        </div>
        <div class="col-md-2 py-3">
            <img class="w-50" src="<?php echo SITE_URL; ?>assets/insti/img/paytm.png" alt="">
        </div>
    </div>
</section>