<?php if (is($data) and is($data['blog'])) : ?>
    <?php $blog = $data['blog']; ?>
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>
                                <?php is($blog->title, 'showCapital'); ?>
                            </h2>
                            <p>Home<span>-</span><?php is($blog->title, 'showCapital'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">

                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?php is($blog->post_image, 'show'); ?>" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>
                                <?php is($blog->short_description, 'show'); ?>
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="far fa-user"></i>
                                        <?php is($blog->category_title, 'showCapital'); ?>
                                    </a>
                                </li>
                            </ul>
                            <p>
                                <?php is($blog->description, 'show'); ?>
                            </p>
                        </div>
                    </div>

                    <div class="navigation-top">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area end =================-->
<?php endif; ?>