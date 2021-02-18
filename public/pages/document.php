<?php is($document, 'json') or show_404(); ?>
<?php $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REDIRECT_URL'];  ?>

<style>
    .likedBtn:hover {
        border-color: #aab4bd;
        background-color: #f7f7f7;
        color: #4e657e;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 600px;
            margin: 0 auto;
        }
    }

    .like_btn_hover_cls {
        border-color: #aab4bd;
        background-color: #f7f7f7;
        color: #4e657e;
    }

    #sidebarCtn {
        background: #ffffff;
    }

    @media (min-width: 768px) {
        .col-md-95 {
            -ms-flex: 0 0 95%;
            flex: 0 0 95%;
            max-width: 95%;
        }

        .col-md-55 {
            -ms-flex: 0 0 5%;
            flex: 0 0 5%;
            max-width: 5%;
        }
    }

    @media (max-width: 767px) {
        #sidebarCtn {
            position: absolute;
            top: 60px;
            left: 0;
            z-index: 1;
        }

        #sidebarCtn.col-md-55 {
            width: 10%;
            background: transparent;
            border-right: none !important;
        }

        #sidebarCtn.col-md-55 #hideDocSidebar {
            margin-top: 8px;
        }
    }

    .clear {
        clear: both;
    }
</style>


<div class="container-fluid">
    <div class="row flex-row-reverse bg-light">
        <div class="bg-light col-md-9 px-0" id="sidebarWrapper" style="height: 90vh; overflow-y:auto">
            <div class="text-right py-1 w-100" id="docHeader" style="z-index: 999; width:100%; ">
                <button class=" float-left btn btn-success ml-md-2 ml-sm-3 ml-5"><a href="<?php echo (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ''; ?>" style="color:#ffffff">Back</a></button>
                <button class=" float-right btn btn-success mr-1">
                    <a href="<?php is_user_login() and print ('#saveModel" data-toggle="modal" data-target="#saveModal') or print(SITE_URL . 'login/?' . $redirect_url); ?>" style="color:#ffffff">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="<?php is($saved, 'json') and print ('rgb(91, 199, 135)') or print('none') ?>" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark mr-1">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <?php is($saved, 'json') and print ('Saved') or print('Save') ?>
                    </a></button>
            </div>
            <div class="pt-1 clear">
                <div class="d-none justify-content-center" style="margin-left:30px">
                    <a href="<?php echo SITE_URL; ?>">
                        <h6>Home</h6>
                    </a>&nbsp; > &nbsp;<a href="<?php echo SITE_URL; ?>document/<?php is($document->slug, 'show'); ?>/<?php is($document->id, 'show'); ?>">
                        <h6>
                            <?php is($document->university_title, 'showCapital'); ?>
                        </h6>
                    </a>
                </div>
                <div class=" position-relative text-center">

                    <style>
                        embed,
                        iframe {
                            width: 100%;
                            height: 100vh;
                            border-radius: 2px;
                            box-shadow: 0 0 32px #00000080;
                        }

                        .footerBorder-mobile {
                            border-radius: 12px;
                            z-index: 999;
                            background-color: #999999;
                            bottom: 4%;
                            left: 25%;
                            right: 0;
                            margin: 0 auto;
                            text-align: center;
                            display: block;
                            width: 50%;
                        }

                        @media (max-width: 767px) {
                            .footerBorder-mobile {
                                border-radius: 12px;
                                z-index: 999;
                                background-color: #999999;
                                bottom: 4%;
                                left: 0%;
                                right: 0;
                                margin: 0 auto;
                                text-align: center;
                                display: block;
                                width: 85%;
                            }
                        }
                    </style>
                    <?php strpos($document->file, '.') !== false and $array = explode('.', SITE_URL . $document->file);
                    is($array, 'array') and $fileType = end($array); ?>

                    <?php if (is($fileType) && (strtoupper($fileType) === 'PDF')) : ?>
                        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
                        <!--border-radius: 12px ;z-index: 99999; background-color:#999999; bottom: 4%;  transform: translate(-53%, 3%); left: 53%; right: -3%-->
                        <div class="position-fixed text-white p-3 footerBorder-mobile" style="">
                            <div class="row">
                                <div class="col-md-12">
                                    <span id="prev" style="width:30px; height:30px;padding-right: 5px;">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M11 2.206l-6.235 7.528-.765-.645 7.521-9 7.479 9-.764.646-6.236-7.53v21.884h-1v-21.883z" />
                                        </svg>
                                    </span>

                                    <span id="next" style="width:30px; height:50px;padding-right: 5px;">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z" />
                                        </svg>
                                    </span>

                                    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>

                                    <span id="zoominbutton" type="button" style="padding-left: 10px;">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5zm-4.5 8h4v-4h1v4h4v1h-4v4h-1v-4h-4v-1z" />
                                        </svg>
                                    </span>

                                    <span id="zoomoutbutton" type="button" style="padding-left: 5px;">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                            <path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5zm-4.5 8h9v1h-9v-1z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <canvas id="the-canvas" class="rounded-lg border"></canvas>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <embed src="<?php echo SITE_URL; ?><?php is($document->file, 'show'); ?>#toolbar=0&navpanes=0&scrollbar=0" />
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 border-right" id="sidebarCtn">
            <div class="row px-3" style="height: 90vh; overflow-y:auto">
                <div class="col-md-12   text-right text-secondary">
                    <div id="hideDocSidebar">
                        <svg width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M223.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L319.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L393.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34zm-192 34l136 136c9.4 9.4 24.6 9.4 33.9 0l22.6-22.6c9.4-9.4 9.4-24.6 0-33.9L127.9 256l96.4-96.4c9.4-9.4 9.4-24.6 0-33.9L201.7 103c-9.4-9.4-24.6-9.4-33.9 0l-136 136c-9.5 9.4-9.5 24.6-.1 34z"></path>
                        </svg>
                    </div>
                </div>
                <div class="col-md-12" id="sidebarDocs">
                    <div class="border-bottom pt-3 pb-2 px-1">
                        <h4><?php is($document->title, 'showCapital'); ?></h4>
                        <h6 class="text-secondary">
                            <?php is($document->description, 'show'); ?>
                        </h6>
                    </div>
                    <div class="border-bottom py-2 px-1">
                        <small class="text-secondary d-block">
                            University
                        </small>
                        <a href="<?php echo SITE_URL; ?>institution/<?php is($document->university_slug, 'show'); ?>">
                            <?php is($document->university_title, 'showCapital'); ?>
                        </a>
                    </div>
                    <div class="border-bottom py-2 px-1">
                        <small class="text-secondary d-block">
                            Course
                        </small>
                        <a href="<?php echo SITE_URL; ?>course/<?php is($document->university_slug, 'show') ?>/<?php is($document->course_slug, 'show') ?>">
                            <?php is($document->course_title, 'showCapital'); ?>
                        </a>
                    </div>
                    <div class="border-bottom py-2 px-1 d-flex">
                        <div class="mr-3">
                            <small class="text-secondary d-block">
                                Uploaded by
                            </small>
                            <a href="<?php echo SITE_URL; ?>user/profile/<?php is($document->university_id, 'show') ?>/<?php is($document->user_id, 'show') ?>">
                                <?php is($document->first_name, 'showCapital'); ?>
                                <?php is($document->last_name, 'showCapital'); ?>
                            </a>
                        </div>
                        <?php
                        if (!empty($document->followed)) {
                            $class = 'success';
                            $text = 'Unfollow';
                            $folow_status = 'followed';
                        } else {
                            $class = 'outline-success';
                            $text = 'Follow';
                            $folow_status = 'unfollow';
                        }

                        if (!isset($_SESSION['USER_ID'])) {
                            $href = SITE_URL . 'login/?' . $redirect_url;
                            $follow_btn_id = '';
                        } else {
                            $href = '';
                            $follow_btn_id = 'follow_user_trgr';
                        }
                        ?>
                        <a <?php echo (!isset($_SESSION['USER_ID'])) ? 'href="' . $href . '"' : ''; ?> class="mt-2 btn btn-sm btn-<?php echo $class; ?> text-center" style="height: 35px" data-attr-follow-status="<?php echo $folow_status; ?>" data-attr-follow-dodument-owner-id="<?php echo $document->user_id; ?>" id="<?php echo $follow_btn_id ?>">
                            <?php echo $text; ?>
                        </a>
                        <!--<a href="<?php echo SITE_URL; ?><?php is($document->followed, 'json') and print ('unfollow') or print('follow'); ?>/<?php is($document->created_by, 'show'); ?>" class="mt-2 btn btn-sm btn-<?php is($document->followed, 'json') and print ('success') or print('outline-success'); ?>  text-center" style="height: 35px">
                            follow
                        </a> -->
                    </div>
                    <div class="border-bottom py-2 px-1">
                        <small class="text-secondary d-block">
                            Academic Year
                        </small>
                        <span>
                            <?php is($document->academic_year, 'show') ?>
                        </span>
                    </div>
                    <div class="border-bottom py-3 px-1">
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-md-12 col-4 pt-2">
                                <span class="text-secondary">Helpful</span>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-4 pl-4 pr-2">
                                <?php
                                //print_r($document);
                                if (!empty($document->is_login_user_helpful)) {

                                    if ($document->is_login_user_helpful['vote'] == 1) {
                                        $like_btn_trgr_cls = 'like_btn_hover_cls';
                                        $unlike_btn_trgr_cls = '';
                                        $user_like_btn_status = 1;
                                        $user_unlike_btn_status = 0;
                                    } else {
                                        $like_btn_trgr_cls = '';
                                        $unlike_btn_trgr_cls = 'like_btn_hover_cls';
                                        $user_like_btn_status = 0;
                                        $user_unlike_btn_status = 1;
                                    }
                                } else {
                                    $like_btn_trgr_cls = '';
                                    $unlike_btn_trgr_cls = '';
                                    $user_like_btn_status = 0;
                                    $user_unlike_btn_status = 0;
                                }
                                ?>
                                <a style="curser:pointer" class="border btn-block text-center py-1 likedBtn <?= $like_btn_trgr_cls ?> " id="like_btn_trgr" data-attr-doc-id="<?php echo $document->id; ?>" data-attr-vote="1" data-btn-action="upvote" data-attr-user_like_btn_status="<?= $user_like_btn_status ?>" <?php is_user_login() or print('href="' . SITE_URL . 'login/?' . $redirect_url . '"'); ?>>
                                    <div class="text-success d-inline">
                                        <svg width="13" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-1">
                                        <?php is($document->helpful, 'show') or print('0'); ?>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-4 pl-2">
                                <a style="curser:pointer" class="border btn-block text-center py-1 likedBtn <?= $unlike_btn_trgr_cls ?>" id="unlike_btn_trgr" data-attr-doc-id="<?php echo $document->id; ?>" data-btn-action="downvote" data-attr-user_unlike_btn_status="<?= $user_unlike_btn_status ?>" data-attr-vote="0" <?php is_user_login() or print('href="' . SITE_URL . 'login/?' . $redirect_url . '"'); ?>>
                                    <div class="text-danger d-inline">
                                        <svg width="13" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M466.27 225.31c4.674-22.647.864-44.538-8.99-62.99 2.958-23.868-4.021-48.565-17.34-66.99C438.986 39.423 404.117 0 327 0c-7 0-15 .01-22.22.01C201.195.01 168.997 40 128 40h-10.845c-5.64-4.975-13.042-8-21.155-8H32C14.327 32 0 46.327 0 64v240c0 17.673 14.327 32 32 32h64c11.842 0 22.175-6.438 27.708-16h7.052c19.146 16.953 46.013 60.653 68.76 83.4 13.667 13.667 10.153 108.6 71.76 108.6 57.58 0 95.27-31.936 95.27-104.73 0-18.41-3.93-33.73-8.85-46.54h36.48c48.602 0 85.82-41.565 85.82-85.58 0-19.15-4.96-34.99-13.73-49.84zM64 296c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm330.18 16.73H290.19c0 37.82 28.36 55.37 28.36 94.54 0 23.75 0 56.73-47.27 56.73-18.91-18.91-9.46-66.18-37.82-94.54C206.9 342.89 167.28 272 138.92 272H128V85.83c53.611 0 100.001-37.82 171.64-37.82h37.82c35.512 0 60.82 17.12 53.12 65.9 15.2 8.16 26.5 36.44 13.94 57.57 21.581 20.384 18.699 51.065 5.21 65.62 9.45 0 22.36 18.91 22.27 37.81-.09 18.91-16.71 37.82-37.82 37.82z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-1">
                                        <?php is($document->not_helpful, 'show') or print('0'); ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom py-3 px-1">
                        <?php if (is_user_login()) : ?>
                            <a href="#reportModel" class="d-flex" data-toggle="modal" data-target="#reportModal">
                            <?php else : ?>
                                <a href="<?php echo SITE_URL; ?>login" class="d-flex">
                                <?php endif; ?>
                                <span class="text-secondary">
                                    <svg width="20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M349.565 98.783C295.978 98.783 251.721 64 184.348 64c-24.955 0-47.309 4.384-68.045 12.013a55.947 55.947 0 0 0 3.586-23.562C118.117 24.015 94.806 1.206 66.338.048 34.345-1.254 8 24.296 8 56c0 19.026 9.497 35.825 24 45.945V488c0 13.255 10.745 24 24 24h16c13.255 0 24-10.745 24-24v-94.4c28.311-12.064 63.582-22.122 114.435-22.122 53.588 0 97.844 34.783 165.217 34.783 48.169 0 86.667-16.294 122.505-40.858C506.84 359.452 512 349.571 512 339.045v-243.1c0-23.393-24.269-38.87-45.485-29.016-34.338 15.948-76.454 31.854-116.95 31.854z"></path>
                                    </svg>
                                </span>
                                <span class="ml-3">Report Document</span>
                                </a>
                    </div>
                    <div class="border-bottom py-3 px-1">
                        <button class="btn btn-outline-secondary btn-block bg-white text-secondary" data-toggle="modal" data-target="#myModal">
                            Share
                        </button>
                        <p class="my-3">Comments</p>
                        <?php if (true) : ?>
                            <form action="" method="post">
                                <div class="form-group text-right">
                                    <input type="hidden" name="study_doc_id" value="<?php is($document->id, 'show') ?>">
                                    <textarea name="comment" id="" rows="3" class="form-input w-100 px-2 py-1" placeholder="Comment or ask a question..."></textarea>
                                    <button class="btn btn-light border" name="postComment" value="<?php echo $redirect_url; ?>">Post</button>
                                </div>
                            </form>

                            <ul class="list-group">
                                <?php if (is($comments, 'array')) foreach ($comments as $comment) : ?>
                                    <li class="list-group-item">
                                        <div class="d-flex">
                                            <?php if (!empty($comment->profile_pic)) : ?>
                                                <div class="mr-3">
                                                    <img class="rounded-circle" src="<?php echo SITE_URL; ?><?php is($comment->profile_pic, 'show') ?>" width="40" height="40" alt="">
                                                </div>
                                            <?php endif; ?>
                                            <div class="">
                                                <div class="d-block">
                                                    <a href="#">
                                                        <?php is($comment->first_name, 'showCapital'); ?>
                                                        <?php is($comment->last_name, 'showCapital'); ?>
                                                    </a>
                                                    <span class="text-secondary">.</span>
                                                    <span class="text-secondary">
                                                        <small><?php is($comment->created_date, 'date'); ?></small>
                                                    </span>
                                                </div>
                                                <div class="d-block">
                                                    <span class="text-secondary">
                                                        <?php is($comment->comment, 'show'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $comment->user_id) { ?>
                                            <a <?php is_user_login() or print('href="' . SITE_URL . 'login/?' . $redirect_url . '"'); ?> id="delete_comment_trgr" data-attr-comment_id="<?= $comment->id; ?>" style="cursor:pointer;">Delete</a>
                                        <?php } ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        <?php else : ?>
                            <button class="btn btn-outline-secondary btn-block bg-white text-secondary">
                                Please sign in or register to post comments.
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="py-2 px-1">
                        <p class="my-2">Related documents</p>
                        <div class="">
                            <?php if (is($related_docs, 'array')) foreach ($related_docs as $doc) : ?>
                                <div class="media d-flex align-items-center border-bottom py-2">
                                    <div class="mr-3">
                                        <svg class="ic ic-document" width="20" height="30" viewBox="0 0 66 84">
                                            <defs>
                                                <linearGradient x1="7.72138756%" y1="26.8474028%" x2="49.6088576%" y2="99.2035081%">
                                                    <stop stop-color="#01d773" stop-opacity="0.325294384" offset="0%"></stop>
                                                    <stop stop-color="#00c563" offset="100%"></stop>
                                                </linearGradient>
                                                <filter x="0.0%" y="0.0%" width="100.0%" height="100.0%" filterUnits="objectBoundingBox">
                                                    <feGaussianBlur stdDeviation="0" in="SourceGraphic"></feGaussianBlur>
                                                </filter>
                                            </defs>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g>
                                                    <path d="M3,0 L48,0 L66,18 L66,81 C66,82.6568542 64.6568542,84 63,84 L3,84 C1.34314575,84 2.02906125e-16,82.6568542 0,81 L0,3 C-2.02906125e-16,1.34314575 1.34314575,3.04359188e-16 3,0 Z" fill="#12d66d"></path>
                                                    <g transform="translate(11.000000, 29.000000)" fill="#FFFFFF">
                                                        <rect x="0" y="0" width="25" height="3" rx="1.5"></rect>
                                                        <rect x="0" y="11" width="44" height="3" rx="1.5"></rect>
                                                        <rect x="0" y="22" width="44" height="3" rx="1.5"></rect>
                                                    </g>
                                                    <g transform="translate(48.000000, 0.000000)">
                                                        <path d="M-4.54747351e-13,0 L18,18 L4,18 C1.790861,18 -4.54476809e-13,16.209139 -4.54747351e-13,14 L-4.54747351e-13,0 Z" fill="#b7f2d6"></path>
                                                        <polygon fill="url(#linearGradient-1)" filter="url(#filter-2)" transform="translate(11.000000, 24.000000) scale(-1, -1) translate(-11.000000, -24.000000) " points="4 18 18 30 4 30"></polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>" class="text-primary">
                                            <?php is($doc->title, 'showCapital'); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title font-weight-bold text-secondary" id="saveModalLabel">
                        Save to a Studylist
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column mb-3">
                        <input type="hidden" name="saveStudylist" value="sdfdf">
                        <?php if (is($studyLists, 'array')) foreach ($studyLists as $studyList) : ?>
                            <div class="p-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="title" class="custom-control-input saveCheck" id="save<?php is($studyList->id, 'show') ?>" value="<?php is($studyList->title, 'show') ?>" <?php is($saved, 'json') and $saved->title == $studyList->title and print('checked'); ?>>
                                    <label class="custom-control-label" for="save<?php is($studyList->id, 'show') ?>">
                                        <?php is($studyList->title, 'show') ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="modal-footer border-0" style="justify-content: flex-start;">
                    <form action="" method="post" id="saveForm">
                        <div class="d-flex" style="align-items: center; justify-content:center">
                            <div class="text-secondary" style="cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="saveShow">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="text-dark" id="savePlaceholder">Create new Studylist</span>
                            </div>
                            <div id="saveInput" style="display: none;">
                                <div class="d-inline-flex">
                                    <div class="form-group mb-0 ml-3">
                                        <input type="text" id="inputTitle" name="title" class="form-control border-primary" placeholder="Enter Studylist Name">
                                    </div>
                                    <button class="btn btn-primary ml-3" id="saveCreate" name="saveStudylist" value="sfgfsdfsd">Create</button>
                                    <button class="btn btn-light ml-3" id="saveCancel">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modalWidth-mobile {
            width: 20%;
            left: 2%;
        }

        @media (max-width: 767px) {
            .modalWidth-mobile {
                width: 100%;
            }
        }
    </style>

    <!-- Modal -->
    <div class="modal fade modalWidth-mobile" id="likeModal" tabindex="-1" aria-labelledby="likeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title font-weight-bold text-secondary" id="likeModalLabel">
                        Leave a comment or say thanks
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group text-right">
                            <input type="hidden" name="study_doc_id" value="<?php is($document->id, 'show') ?>">
                            <textarea name="comment" id="" rows="3" class="form-input w-100 px-2 py-1 mb-3" placeholder="Comment or ask a question..."></textarea>
                            <button class="btn btn-transparent text-secondary" data-dismiss="modal" aria-label="Close">Skip</button>
                            <button class="btn btn-primary border" name="postComment" value="sdfs">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="" method="post">


                <input type="hidden" name="document_id" value="<?php is($document->id, 'show') ?>">
                <div class="modal-content p-3">
                    <div class="modal-header border-0">
                        <h4 class="modal-title font-weight-bold text-secondary" id="reportModalLabel">
                            Report Document
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="wrongCourse" checked name="reason" class="custom-control-input" value="This document is uploaded under the wrong course">
                            <label class="custom-control-label h5 text-secondary" for="wrongCourse">
                                This document is uploaded under the wrong course
                            </label>
                            <p style="color: #9ea9b5">
                                It belongs to a course other than General Principles of Law of Torts
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="wrongTitle" name="reason" class="custom-control-input" value="The title or description is wrong">
                            <label class="custom-control-label h5 text-secondary" for="wrongTitle">
                                The title or description is wrong
                            </label>
                            <p style="color: #9ea9b5">
                                The content of the document isn't accurately described
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="lowQuality" name="reason" class="custom-control-input" value="Low quality or useless content">
                            <label class="custom-control-label h5 text-secondary" for="lowQuality">
                                Low quality or useless content
                            </label>
                            <p style="color: #9ea9b5">
                                The content may be irrelevant, contain just the course outline/lecture slides, has many spelling/grammar errors or is (nearly) blank.
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="readble" name="reason" class="custom-control-input" value="Readability issue">
                            <label class="custom-control-label h5 text-secondary" for="readble">
                                Readability issue
                            </label>
                            <p style="color: #9ea9b5">
                                The document is difficult to read because of poor handwriting or a low quality scan/photo.
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="otherReason" name="reason" class="custom-control-input">
                            <label class="custom-control-label h5 text-secondary" for="otherReason">
                                Other Reason
                            </label>
                            <div class="form-group mt-3 collapse" id="reasonContainer">
                                <label for="otherReasonText" class="text-secondary">
                                    Please inform us about your reason to report this question:
                                </label>
                                <textarea name="reasonText" class="form-control" id="otherReasonText"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right border-0 bg-white">
                        <button class="btn btn-light border-secondary" type="reset" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn btn-primary ml-3" name="reportSubmit" value="sdfsdfsfsdfsd">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>
        .facebook-color-share-btn {
            display: flex;
            transition: background-color .3s, border-color .3s, color .3s;
            border: 1px solid #3a5795;
            background-color: #3a5795;
            color: #fff;
            flex-grow: 1;
            align-items: center;
            justify-content: center;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 3px;
            padding: 6px 15px;
            line-height: 1.42857;
            font-size: 14px;
        }

        .facebook-color-share-btn svg {
            width: .625em;
        }

        .facebook-color-share-btn:hover,
        .whatsapp-color-share-btn:hover {
            color: #fff;
        }

        .whatsapp-color-share-btn {
            display: flex;
            transition: background-color .3s, border-color .3s, color .3s;
            border: 1px solid #2cb742;
            background-color: #2cb742;
            color: #fff;
            flex-grow: 1;
            align-items: center;
            justify-content: center;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 3px;
            padding: 6px 15px;
            line-height: 1.42857;
            font-size: 14px;
        }

        .whatsapp-color-share-btn svg {
            width: .875em;
        }
    </style>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Share Document</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $redirect_url ?>" target="_blank" class="facebook-color-share-btn">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10 fa-lg " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="col-md-6 col-6">
                            <a href="//web.whatsapp.com/send?text=<?php echo $redirect_url ?>" data-action="share/whatsapp/share" target="_blank" class="whatsapp-color-share-btn">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14 fa-lg " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                </svg>
                            </a><br>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-9">
                            <input type="text" value="<?php echo $redirect_url ?>" id="myInput" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button onclick="myFunction()" class="btn btn-success">Copy text</button>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal AutoLoad -->
    <div id="model_auto_load" class="modal fade">
        <div class="modal-dialog" style="height: 100%;display:flex;align-items:center">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#219653">
                    <div class="row">
                        <div class="col-12 text-center" style="color: #ffffff">
                            <h5>You are currently viewing a preview</h5>
                            <p>The preview contains 4 out of 6 pages. You need a Premium account to see the full document.</p>
                        </div>
                    </div>
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>
                <div class="modal-body" style="background-color:#5bc787;color:#ffffff">
                    <div class="row">
                        <div class="col-6 pr-md-4">
                            <p>Option 1</p>
                            Share your documents to get free Premium access
                        </div>
                        <div class="col-6 pl-md-4">
                            <p> Option 2</p>
                            Upgrade to Premium to read the full document
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
                            $payment_redirect_url = SITE_URL . 'payment';
                            $upload_redirect_url = SITE_URL . 'upload';
                        } else {
                            $payment_redirect_url = SITE_URL . 'login/?' . SITE_URL . 'payment';
                            $upload_redirect_url = SITE_URL . 'login/?' . SITE_URL . 'upload';
                        }
                        ?>
                        <div class="col-6 pr-md-4">
                            <a class="nav-link btn text-white rounded mt-2 px-3 py-2" href="<?= $payment_redirect_url;  ?>" style="background: #e7a41f">Get a free 30 days trial</a>
                        </div>
                        <div class="col-6 pl-md-4">
                            <a class="nav-link btn rounded mt-2 px-3 py-2" href="<?= $upload_redirect_url;  ?>" style="background: #ffffff;color:#000000">Upload</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo SITE_URL; ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo SITE_URL; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <?php if (is($fileType) && (strtoupper($fileType) === 'PDF')) : ?>
        <script>
            var url = '<?php echo SITE_URL ?><?php is($document->file, 'show'); ?>';

            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var pdfjsLib = window['pdfjs-dist/build/pdf'];

            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

            var pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 0.6,
                canvas = document.getElementById('the-canvas'),
                ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;
                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport({
                        scale: scale
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                // Update page counters
                document.getElementById('page_num').textContent = num;
            }

            /**
             * If another page rendering in progress, waits until the rendering is
             * finised. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            /**
             * Displays previous page.
             */
            function onPrevPage() {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                queueRenderPage(pageNum);
            }
            document.getElementById('prev').addEventListener('click', onPrevPage);

            /**
             * Displays next page.
             */
            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum);
            }
            document.getElementById('next').addEventListener('click', onNextPage);

            /**
             * Asynchronously downloads PDF.
             */
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;

                // Initial/first page rendering
                renderPage(pageNum);
            });

            var zoominbutton = document.getElementById("zoominbutton");
            zoominbutton.onclick = function() {
                scale = scale + 0.25;
                renderPage(pageNum);
            }

            var zoomoutbutton = document.getElementById("zoomoutbutton");
            zoomoutbutton.onclick = function() {
                if (scale <= 0.25) {
                    return;
                }
                scale = scale - 0.25;
                renderPage(pageNum);
            }
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(() => {

            $('.accorrding').click(function() {
                $('.accorrding').css('border-bottom', 'none');

                if ($('.accorrding > a').hasClass('active')) {
                    $(this).css('border-bottom', '3px solid #0088d7');
                }
            })

            if ($('#sidebarContainer').length) {
                $('#sidebarStart').click(function() {
                    $('#sidebarContainer').show();
                    $('#placeholderr').show();
                });
            }
            if ($('#closeSidebar').length) {
                $('#closeSidebar').click(function() {
                    $('#sidebarContainer').hide();
                    $('#placeholderr').hide();
                });
            }

            $(document).on('click', '#delete_comment_trgr', function() {

                var comment_id = $(this).attr('data-attr-comment_id');
                //alert(doc_owner_id);
                $.ajax({
                    type: "POST",
                    url: "<?php echo SITE_URL; ?>fetch/delete_comment",
                    data: {
                        comment_id: comment_id
                    },
                    success: function(response) {
                        console.log(response);

                        if (response == '1') {
                            //console.log($('#delete_comment_trgr').parents('li'));
                            $('#delete_comment_trgr').parents('li').remove();
                        } else {
                            console.log('comment not delete some error');
                        }
                    },
                    error: function(err) {
                        console.error(err)
                    }
                });
            });

            $(document).on('click', '#follow_user_trgr', function() {

                var follow_status = $(this).attr('data-attr-follow-status');
                var user_id = '<?php echo $_SESSION['USER_ID'] ?>';
                var doc_owner_id = $(this).attr('data-attr-follow-dodument-owner-id');
                //alert(doc_owner_id);
                $.ajax({
                    type: "POST",
                    url: "<?php echo SITE_URL; ?>fetch/change_follow_status",
                    data: {
                        follow_status: follow_status,
                        user_id: user_id,
                        doc_owner_id: doc_owner_id
                    },
                    success: function(response) {
                        console.log(response);

                        if (response == '1') {
                            $(this).attr('data-attr-follow-status', 'unfollow');
                            $('#follow_user_trgr').html('Unfollow');
                            $('#follow_user_trgr').addClass('btn-success');
                            $('#follow_user_trgr').removeClass('btn-outline-success');
                        } else {
                            $(this).attr('data-attr-follow-status', 'unfollow');
                            $('#follow_user_trgr').html('Follow');
                            $('#follow_user_trgr').removeClass('btn-success');
                            $('#follow_user_trgr').addClass('btn-outline-success');
                        }
                    },
                    error: function(err) {
                        console.error(err)
                    }
                });
            });

            $(document).on('click', '#like_btn_trgr, #unlike_btn_trgr', function() {
                //alert();
                var doc_id = $(this).attr('data-attr-doc-id');
                var vote = $(this).attr('data-attr-vote');
                var action = $(this).attr('data-btn-action');

                if (action == 'upvote') {
                    if ($(this).attr('data-attr-user_like_btn_status') == 1) {
                        alert('already liked');
                    } else {
                        vote_f(doc_id, vote);
                        $(this).addClass('like_btn_hover_cls');
                        $('#unlike_btn_trgr').removeClass('like_btn_hover_cls');

                        $('#like_btn_trgr').children('span').html(parseInt($('#like_btn_trgr').children('span').html()) + 1);
                        $(this).attr('data-attr-user_like_btn_status', 1);

                        if ($('#unlike_btn_trgr').attr('data-attr-user_unlike_btn_status') == 1) {
                            $('#unlike_btn_trgr').children('span').html(parseInt($('#unlike_btn_trgr').children('span').html()) - 1);
                            $('#unlike_btn_trgr').attr('data-attr-user_unlike_btn_status', 0);
                        }

                        // $('#likeModal').modal('show');

                    }
                }

                if (action == 'downvote') {
                    if ($(this).attr('data-attr-user_unlike_btn_status') == 1) {
                        alert('already unliked');
                    } else {
                        vote_f(doc_id, vote);

                        $(this).addClass('like_btn_hover_cls');
                        $('#like_btn_trgr').removeClass('like_btn_hover_cls');

                        $('#unlike_btn_trgr').children('span').html(parseInt($('#unlike_btn_trgr').children('span').html()) + 1);
                        $(this).attr('data-attr-user_unlike_btn_status', 1);

                        if ($('#like_btn_trgr').attr('data-attr-user_like_btn_status') == 1) {
                            $('#like_btn_trgr').children('span').html(parseInt($('#like_btn_trgr').children('span').html()) - 1);
                            $('#like_btn_trgr').attr('data-attr-user_like_btn_status', 0);
                        }

                    }
                }
            });

            $('input[type=radio]').change(function(e) {
                if ($('#otherReason').is(':checked')) {
                    $('#reasonContainer').collapse('show')
                }
                if (!$('#otherReason').is(':checked')) {
                    $('#reasonContainer').collapse('hide');
                }
            })

            $('#hideDocSidebar').click(() => {
                if ($('#sidebarCtn').hasClass('col-md-3')) {
                    $('#docHeader').css('width', '90vw');
                    $("#sidebarDocs").hide();
                    $('#sidebarCtn').removeClass('col-md-3').addClass('col-md-55')
                    $('#sidebarWrapper').removeClass('col-md-9').addClass('col-md-95')
                } else {
                    $('#docHeader').css('width', '75vw');
                    $('#sidebarDocs').show();
                    $('#sidebarCtn').removeClass('col-md-55').addClass('col-md-3')
                    $('#sidebarWrapper').removeClass('col-md-95').addClass('col-md-9')
                }

            })

            $('#saveShow').click(e => {
                e.preventDefault();
                $('#saveInput').show();
                $('#savePlaceholder').hide();
            });

            $('#saveCancel').click(e => {
                e.preventDefault();
                $('#saveInput').hide();
                $('#savePlaceholder').show();
            })

            $('.saveCheck').change(function() {
                if (this.checked) {
                    $('#inputTitle').val($(this).val())
                    $('#saveForm').submit();
                } else {
                    $('#inputTitle').val('')
                    $('#saveForm').submit();
                }
            });

            /*$('#likeModal').on('hidden.bs.modal', function(e) {
                window.location.href = "<?php echo SITE_URL; ?>helpful/<?php is($document->id, 'show') ?>/1"
            })*/
        })

        function vote_f(doc_id, vote) {


            //alert(doc_owner_id);
            $.ajax({
                type: "POST",
                url: "<?php echo SITE_URL; ?>fetch/like_unlike_doc",
                data: {
                    doc_id: doc_id,
                    vote: vote,
                },
                success: function(response) {
                    console.log(response);

                    if (response == '1') {
                        //$(this).attr('data-attr-follow-status', 'unfollow');
                        //$('#follow_user_trgr').html('Unfollow');
                        //$('#follow_user_trgr').addClass('btn-success');
                        //$('#follow_user_trgr').removeClass('btn-outline-success');
                    } else {
                        //$(this).attr('data-attr-follow-status', 'unfollow');
                        //$('#follow_user_trgr').html('Follow');
                        //$('#follow_user_trgr').removeClass('btn-success');
                        //$('#follow_user_trgr').addClass('btn-outline-success');
                    }
                },
                error: function(err) {
                    console.error(err)
                }
            });
        }
    </script>
    <script language="javascript">
        function fbshareCurrentPage() {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href) + "&t=" + document.title, '',
                'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
            return false;
        }
    </script>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            //alert("Copied the text: " + copyText.value);
        }
    </script>
    <?php if (!isset($_SESSION['USER_ID']) || $view == 0) : ?>
        <script>
            $(document).ready(function() {
                //$("#model_auto_load").modal('show');
                $('#model_auto_load').modal({
                    backdrop: 'static',
                    keyboard: false
                })
            });
        </script>
    <?php endif; ?>