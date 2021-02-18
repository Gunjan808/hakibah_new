<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>plugins/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo SITE_URL; ?>plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>plugins/select2/select2.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_URL; ?>favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <style>
        .logoHeight-30 {
            height: 50px;
        }

        @media (min-width: 1480px) .container {
            max-width: 1430px;

        }

        @media (min-width: 1200px) .container {
            max-width: 1170px;
        }



        @media (min-width: 992px) .container {
            max-width: 960px;
        }

        @media (max-width: 767px) {
            .logoHeight-30 {
                height: 30px;
            }

            .mobile-padding-xs {
                padding: 8px 0px !important;
            }

            .dropdown-menuMobile {
                left: -40vw !important;
            }
        }

        @media (min-width: 768px) .container {
            max-width: 720px;
        }


        @media (min-width: 576px) .container {
            max-width: 540px;
        }

        * {
            font-family: Lato, Verdana, sans-serif
        }

        a {
            text-decoration: none !important;
            color: #5bc787;
        }

        .bg-primary {
            background-color: #5bc787 !important;
        }

        .btn-primary {
            background-color: #5bc787 !important;
            border-color: #5bc787 !important;
            box-shadow: none !important;
        }

        .border-primary {
            border-color: #5bc787 !important;

        }

        .btn-outline-primary {
            color: #5bc787 !important;
            border-color: #5bc787 !important;
        }

        .text-primary {
            color: #5bc787 !important;
        }

        .custom-control-label::before {
            background-color: #5bc787 !important;
            border-color: #5bc787 !important;
        }

        .bg-success {
            background-color: #0088d7 !important;
        }

        .btn-success {
            background-color: #0088d7 !important;
            border-color: #0088d7 !important;
            box-shadow: none !important;
        }

        .border-success {
            border-color: #0088d7 !important;
        }

        .btn-outline-success {
            color: #0088d7 !important;
            border-color: #0088d7 !important;
        }

        .text-success {
            color: #0088d7 !important;
        }

        .bg-warning {
            background-color: #ffc823 !important;
        }

        .btn-warning {
            background-color: #ffc823 !important;
            border-color: #ffc823 !important;
            box-shadow: none !important;
        }

        .border-warning {
            border-color: #ffc823 !important;
        }

        .btn-outline-warning {
            color: #ffc823 !important;
            border-color: #ffc823 !important;
        }

        .text-warning {
            color: #ffc823 !important;
        }

        .btn-info {
            background-color: #17b862 !important;
            border-color: #17b862 !important;
        }

        .myHover>* {
            /* padding: 2%; */
            transition: all 0.3s ease-in-out;
        }

        .myHover:hover>* {
            background: #00000010 !important;
            border-radius: 2px;
        }


        /*MANISH CSS START*/
        .btn-green {
            background-color: #17b862 !important;
            border-color: #17b862 !important;
            box-shadow: none !important;
        }

        .white-text {
            color: #ffffff !important;
        }

        .green-text {
            color: #17b862 !important;
        }

        .radius-50 {
            border-radius: 50px;
        }

        .nav-pills .nav-links {
            color: #212529 !important;
            position: relative;
            padding-bottom: 15px;
            display: block;
        }

        .custom-nav-pills.nav-pills .nav-links.active,
        .custom-nav-pills.nav-pills .nav-links:hover,
        .custom-nav-pills.nav-pills .nav-links:focus {
            color: #17b862 !important;
        }

        .custom-nav-pills.nav-pills .nav-links.active::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            background: #17b862;
            width: 100%;
            height: 5px;
            border-radius: 5px 5px 0 0;
        }

        .dateRating h6 a {
            color: #212529 !important;
        }

        .dateRating h6 a:hover,
        .dateRating h6 a.active {
            color: #17b862 !important;
            text-decoration: underline !important;
        }
    </style>
</head>

<body style="height:80vh;">
    <?php //die(var_dump(get_method() !== 'panel'));
    ?>
    <?php //if (is_user_login()) : 
    ?>
    <div class="bg-light position-fixed" style="max-width: 300px; width: 300px; height: 100vh;overflow-y:auto; z-index: 9999999; display: none" id="sidebarContainer">
        <div class="d-flex p-3" style="flex-direction: row; align-items: center; justify-content: space-between">
            <div class="d-flex" style="flex-direction:row; align-items: center;">
                <div class="text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </div>
                <a class="ml-3" href="<?php echo SITE_URL; ?>">
                    <div class="p-1">
                        <img style="height: 35px;" src="<?php is($site->site_logo, 'show') ?>" alt="">
                    </div>
                </a>
            </div>
            <div class="mr-3" style="cursor: pointer" id="closeSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
        <div class="d-flex " style="flex-direction: row; align-items: center;">
            <div class="rounded-circle bg-warning p-1 text-center" style="width: 30px; height:30px;margin-left:43px;">
                <?php is($_SESSION['USER_NAME']) and print(substr($_SESSION['USER_NAME'], 0, 1)) ?>
            </div>
            <h6 class="mb-0 ml-3 font-weight-bold text-dark">
                <a href="<?php echo SITE_URL ?>profile"><?php is($_SESSION['USER_NAME'], 'showCapital'); ?></a>
            </h6>
        </div>
        <div class="px-4 p-2 d-inline-flex mt-3">
            <a href="<?= SITE_URL; ?>" style="display: inline-block;float: left;">
                <div class="text-primary ml-4" style="display: inline-block;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                </div>
                <span class="ml-3">Dashboard</span>
            </a>
        </div>
        <div class="p-2 pt-4 pb-2 ml-4">
            <span class="font-weight-bold text-secondary mb-3 px-3">
                My Library
            </span>
            <div class="accordion mt-3" id="accordionExample">
                <div class="card border-0">
                    <a href="#" style="color:#000000">
                        <div class="card-header myHover" id="headingOne">
                            <span class="text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="d-flex text-primary" style="align-items: center; justify-self: space-between;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder">
                                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <span class="ml-3 text-dark">Courses</span>
                                    <div class="ml-auto mr-0 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php if (is($my_courses)) : ?>
                                    <?php foreach ($my_courses as $course) : ?>
                                        <li class="media my-1 py-1">
                                            <div class="media-body pt-1">
                                                <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>course/<?php is($course->university_slug, 'show') ?>/<?php is($course->slug, 'show') ?>">
                                                    <?php is($course->title, 'showCapital'); ?>
                                                    <span class="ml-1 text-secondary">
                                                        <?php is($course->course_code, 'show'); ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    You don't have any courses yet.
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0">
                    <a href="#" style="color:#000000">
                        <div class="card-header" id="headingTwo">
                            <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="d-flex text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                    <span class="ml-3 text-dark">Books</span>
                                    <div class="ml-auto mr-0 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php if (is($my_book)) : foreach ($my_book as $book) : ?>
                                        <li class="media my-1 py-1">
                                            <div class="media-body pt-1">
                                                <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>book/<?php is($book->slug, 'show') ?>">
                                                    <?php is($book->title, 'showCapital'); ?>
                                                    <span class="ml-1 text-secondary">
                                                        <?php is($book->course_code, 'show'); ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    You don't have any books yet.
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0">
                    <a href="#" style="color:#000000">
                        <div class="card-header" id="headingTwo">
                            <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <div class="d-flex text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                        <line x1="8" y1="6" x2="21" y2="6"></line>
                                        <line x1="8" y1="12" x2="21" y2="12"></line>
                                        <line x1="8" y1="18" x2="21" y2="18"></line>
                                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                    </svg>
                                    <span class="ml-3 text-dark">Studylists</span>
                                    <div class="ml-auto mr-0 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php if (is($studyLists)) : foreach ($studyLists as $studylist) : ?>
                                        <li class="media my-1 py-1">
                                            <div class="media-body pt-1">
                                                <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>studylist/<?php is($studylist->id, 'show') ?>">
                                                    <?php is($studylist->title, 'showCapital'); ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    You don't have any studylists yet.
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0">
                    <a href="#" style="color:#000000">
                        <div class="card-header" id="headingThree">
                            <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="d-flex text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    <span class="ml-3 text-dark">Recent Documents</span>
                                    <div class="ml-auto mr-0 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <?php if (is($recent_docs)) : foreach ($recent_docs as $doc) : ?>
                                        <li class="media my-1 py-1">
                                            <div class="media-body pt-1">
                                                <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                    <?php is($doc->title, 'showCapital'); ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    You don't have any Documents yet.
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0">
                    <a href="#">
                        <div class="card-header" id="headingTwo">
                            <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <div class="d-flex text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                        <line x1="8" y1="6" x2="21" y2="6"></line>
                                        <line x1="8" y1="12" x2="21" y2="12"></line>
                                        <line x1="8" y1="18" x2="21" y2="18"></line>
                                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                    </svg>
                                    <span class="ml-3 text-dark"><a style="color:#000000" href="<?php echo SITE_URL; ?>likedlist/<?php echo $_SESSION['USER_ID'] ?>">Liked List</a></span>
                                    <div class="ml-auto mr-0 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        </svg>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="card border-0">
                    <a href="#">
                        <div class="card-header" id="headingTwo">
                            <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <div class="d-flex text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="16 12 12 8 8 12"></polyline>
                                        <line x1="12" y1="16" x2="12" y2="8"></line>
                                    </svg>
                                    <span class="ml-3 text-dark"><a style="color:#000000" href="<?php echo SITE_URL; ?>user/uploads">Uploads</a></span>
                                    <div class="ml-auto mr-0 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        </svg>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php //endif; 
    ?>
    <div class=" border-bottom">
        <div class="container<?php echo ((get_method() == 'panel' and is_user_login()) || get_method() == 'document') ? '-fluid' : '' ?>">
            <header>
                <?php if (is_user_login() and !is($_SESSION['USER_EMAIL_VERIFIED'])) : ?>
                    <!--<div class="bg-success p-3 text-center">-->
                    <!--    <span class="text-white">-->
                    <!--        Please check your email and activate your account (just confirming you're you.)-->
                    <!--    </span>-->
                    <!--    <a href="<?php echo SITE_URL; ?>verification" class="btn btn-primary ml-3">Resend Email</a>-->
                    <!--</div>-->
                <?php endif; ?>

                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between mobile-padding-xs">
                    <div class="container-fluid my-0dot5 my-xl-0">
                        <div class="d-flex" style="flex-direction: row; align-items: center">
                            <?php if (is_user_login()) : ?>
                                <div class="mr-3" style="cursor: pointer;" id="sidebarStart">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="<?php echo SITE_URL; ?>">
                                <img class="logoHeight-30" src="<?php is($site->site_logo, 'show') ?>" alt="">
                            </a>
                            <?php if (!is_user_login()) : ?>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            <?php endif; ?>
                        </div>
                        <div id="navbarSupportedContent" class="navbar-collapse" style="float:right">
                            <ul class=" navbar-nav ml-auto d-inline-flex d-md-flex">
                                <?php if (is($_SESSION['LOGIN']) and is($_SESSION['USER_ID']) and is($_SESSION['USER_EMAIL']) and is($_SESSION['USER_TYPE']) and $_SESSION['USER_TYPE'] === 'SUBSCRIBER') : ?>
                                    <li class="nav-item mr-sm-0 mr-md-4">
                                        <a href="<?php echo SITE_URL; ?>payment" class="nav-link btn-sm btn-warning text-white rounded px-3 py-2 d-none d-md-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                            </svg> Upgrade
                                        </a>
                                    </li>
                                    <li class="nav-item mr-sm-0 mr-md-4">
                                        <a href="<?php echo SITE_URL; ?>upload" class="nav-link btn-sm btn-primary text-white rounded px-3 py-2 d-none d-md-block">
                                            <svg width="18" height="18" class="mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                <path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"></path>
                                            </svg> Upload
                                        </a>
                                    </li>
                                    <li class="nav-item mr-sm-0 mr-md-3 dropdown mt-md-1">
                                        <a href="" class="text-secondary  d-none d-md-block" role="button" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" width="20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="notifications" style="right: 0; left: -25vw; top: 35px;">
                                            <?php if (is($notifications, 'array')) : ?>
                                                <ul class="list-group list-group-flush" style="height:400px; overflow-y: scroll; ">
                                                    <li class="list-group-item">Last Notifications</li>
                                                    <?php foreach ($notifications as $notification) : ?>
                                                        <li class="list-group-item">
                                                            <div class="d-flex">
                                                                <div class="text-success rounded-lg text-center pt-2 mx-2 mr-3" style="background: #e0f4e8; width: 40px; height: 40px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                                    </svg>
                                                                </div>
                                                                <a class="text-dark text-decoration-none" href="">
                                                                    <?php is($welcome_notification['action'], 'show'); ?>
                                                                    <?php echo $_SESSION['USER_NAME'] ?>
                                                                    <p class="text-secondary">
                                                                        <?php is($welcome_notification['created_date'], 'timeago'); ?>
                                                                    </p>
                                                                </a>

                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="d-flex">
                                                                <div class="text-success rounded-lg text-center pt-2 mx-2 mr-3" style="background: #e0f4e8; width: 40px; height: 40px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                                    </svg>
                                                                </div>
                                                                <?php if (is($notification->slug)) : ?>
                                                                    <a class="text-dark text-decoration-none" href="<?php echo SITE_URL; ?>document/<?php is($notification->slug, 'show'); ?>/<?php is($notification->id, 'show'); ?>">
                                                                        Uploaded document
                                                                        <span class="text-primary">
                                                                            <?php is($notification->title, 'showCapital'); ?>
                                                                        </span> approved!
                                                                        <p class="text-secondary">
                                                                            <?php is($notification->created_date, 'timeago'); ?>
                                                                        </p>
                                                                    </a>
                                                                <?php else : ?>
                                                                    <a class="text-dark text-decoration-none" href="<?php echo SITE_URL; ?>payment">
                                                                        For Unlimited Document, checkout our paid plan!
                                                                        <p class="text-secondary">
                                                                            <?php is($notification->created_date, 'timeago'); ?>
                                                                        </p>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>
                                                    <li class="list-group-item text-center">
                                                        <a href="<?php echo SITE_URL; ?>notifications">
                                                            See all notifications
                                                        </a>
                                                    </li>
                                                </ul>
                                            <?php else : ?>
                                                <div class="text-center p-4 ">
                                                    <span>You are up to date!</span><br>
                                                    <span>No notifications</span>
                                                    <div class="mt-3">
                                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M34 6C34 2.68629 36.6863 0 40 0V0C43.3137 0 46 2.68629 46 6V8H34V6Z" fill="#D5D5D5"></path>
                                                            <path d="M29 69H51V69C51 75.0751 46.0751 80 40 80V80C33.9249 80 29 75.0751 29 69V69Z" fill="#D5D5D5"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M40 7C23.5877 7 10.4311 20.5809 10.9519 36.9849L11 38.5C11.3166 46.2485 8.15378 53.733 2.37661 58.9064L1.46317 59.7244C0.532089 60.5581 0 61.7489 0 62.9987V63.8036C0 67.2258 2.77424 70 6.19643 70H73.7465C77.2002 70 80 67.2002 80 63.7464V63.0437C80 61.762 79.469 60.5375 78.5333 59.6615L77.9329 59.0994C72.234 53.7642 69 46.3065 69 38.5L69.0481 36.9849C69.5689 20.5809 56.4123 7 40 7ZM29.5 46C31.9853 46 34 43.9853 34 41.5C34 39.0147 31.9853 37 29.5 37C27.0147 37 25 39.0147 25 41.5C25 43.9853 27.0147 46 29.5 46ZM55 41.5C55 43.9853 52.9853 46 50.5 46C48.0147 46 46 43.9853 46 41.5C46 39.0147 48.0147 37 50.5 37C52.9853 37 55 39.0147 55 41.5ZM40 59C43.3137 59 46 56.3137 46 53H34C34 56.3137 36.6863 59 40 59Z" fill="#D5D5D5"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle nav-link d-flex" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="flex-direction: row; align-items: center;padding: 0;">
                                                <div class="rounded-circle bg-warning p-1 text-center mr-1" style="width: 35px; height:35px">
                                                    <?php is($_SESSION['USER_NAME']) and print(substr($_SESSION['USER_NAME'], 0, 1)) ?>
                                                </div>
                                            </a>

                                            <style>
                                                .list-group-item {
                                                    position: relative;
                                                    display: block;
                                                    padding: .5rem 1.25rem;
                                                    background-color: #fff;
                                                    border: 1px solid rgba(0, 0, 0, .125);
                                                }
                                            </style>
                                            <div class="dropdown-menu dropdown-menuMobile" style="right: 0; left: -10vw; top: 98%;">
                                                <ul class="list-group list-group-flush " aria-labelledby="dropdownMenuButton" style="z-index:999999">
                                                    <a href="<?php echo SITE_URL; ?>panel" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>Dashboard</span>
                                                            <div class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                    </a>
                                                    <a href="<?php echo SITE_URL; ?>profile" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>Profile</span>
                                                            <div class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                    </a>
                                                    <a href="<?php echo SITE_URL; ?>subscription" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>Subscription</span>
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                    </a>
                                                    <a href="<?php echo SITE_URL; ?>upload" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>Upload</span>
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload">
                                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                                    <polyline points="17 8 12 3 7 8"></polyline>
                                                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="<?php echo SITE_URL; ?>payment" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>
                                                                Upgrade
                                                            </span>
                                                            <div class="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="<?php echo SITE_URL; ?>setting" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>Settings</span>
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="<?php echo SITE_URL; ?>logout" class="list-group-item list-group-item-action">
                                                        <div class="d-flex" style="align-items: center; justify-content: space-between">
                                                            <span>Logout</span>
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                                    <path d="M16 9v-4l8 7-8 7v-4h-8v-6h8zm-16-7v20h14v-2h-12v-16h12v-2h-14z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item active mr-sm-0 mr-md-4">
                                        <a class="nav-link text-primary" href="<?php echo SITE_URL; ?>login">
                                            Sign in
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary text-white rounded px-3 py-2" href="<?php echo SITE_URL; ?>register">Register</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </div>
    <div id="placeholderr" style="position: fixed; top:0; left:0; right:0; bottom:0; background: #00000080;z-index:9999998; display:none"></div>
    <main>