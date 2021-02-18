<style>
    @media (max-width: 767px){
        .w100-mobile-xs{
            width: 100% !important;
            margin: 20px 0 !important;
        }
        .d-flex-custom{
            display: initial !important;
        }
        .d-flex-custom-profile {
            display: flex !important;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .d-flex-custom-profile .ml-5{
            margin-left: 0 !important;   
        }
    }
</style>

<!-- Breadcrumb Section -->
<section class="py-1 bg-light">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 d-inline-flex d-flex-custom d-flex-custom-profile">
                <div class="rounded-circle bg-warning p-1 text-center mr-3 d-flex" style="width: 100px; height:100px;align-items: center; justify-content: center;">
                    <span class="text-white h1">
                        <?php is($data['user']['first_name']) and print(substr($data['user']['first_name'], 0, 1)) ?>
                    </span>
                </div>
                <div class="ml-5">
                    <h2 class="font-weight-bold text-secondary">
                        <?php echo (isset($data['user']['first_name'])) ? ucfirst($data['user']['first_name']) : '';  ?>&nbsp;<?php echo (isset($data['user']['last_name'])) ? ucfirst($data['user']['last_name']) : '';  ?>
                    </h2>
                    <a class="text-decoration-none mb-2 d-block" href="<?php echo SITE_URL ?>institution/<?php is($data['university']->slug, 'show') ?>">
                        <?php is($data['university']->title, 'showCapital'); ?>
                    </a>
                    <span class="text-secondary">Level <span class="badge badge-warning text-white">
                            <?php is($data['total']->total_upload, 'show') or print('0'); ?>
                        </span> Contribute</span>
                </div>

                <div class="card mr-3 ml-auto w-25 w100-mobile-xs">
                    <div class="card-header bg-white">
                        <div class="d-flex" style="justify-content: space-between; align-items: center;">
                            <span class="text-secondary">TOTAL POINTS</span>
                            <h4 class="font-weight-bold">
                                <?php //is($data['total']->total_upload) and print ($data['total']->total_upload * 50) or print('0'); ?>
                                <?= $data['user_total_points'] ?>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex text-" style="justify-content: space-between; align-items: center;">
                            <span style="font-size: 16px;">Level
                                <?php is($data['total']->total_upload, 'show') or print('0'); ?>
                            </span>
                            <span style="font-size: 14px;">
                                <?php is($data['total']->total_upload) and print (($data['total']->total_upload * 50) + 50) or print('50'); ?>
                                point to Level
                                <?php is($data['total']->total_upload) and print ($data['total']->total_upload + 1) or print('1'); ?></span>
                        </div>
                        <div class="progress mt-1" style="height: .3rem;">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-secondary font-weight-bold">
                    Statistics
                </h5>
                <div class="d-inline-flex w-100 d-flex-custom">
                    <div class="card w100-mobile-xs" style="width: 40%;">
                        <div class="card-header bg-white">
                            <div class="d-flex" style="justify-content: space-between; align-items: center;">
                                <span class="text-secondary">
                                    <svg width="28px" height="23px" viewBox="0 0 58 53">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g>
                                                <g transform="translate(0.000000, 7.000000)" stroke="#F8C865" stroke-width="4">
                                                    <path d="M14,20 L14,2 L10,2 C5.581722,2 2,5.581722 2,10 L2,11 C2,15.9705627 6.02943725,20 11,20 L14,20 Z"></path>
                                                    <path d="M56,20 L56,2 L52,2 C47.581722,2 44,5.581722 44,10 L44,11 C44,15.9705627 48.0294373,20 53,20 L56,20 Z" transform="translate(50.000000, 11.000000) scale(-1, 1) translate(-50.000000, -11.000000) "></path>
                                                </g>
                                                <g transform="translate(14.000000, 14.000000)">
                                                    <path d="M12,0 L18,0 L18,36 L18,36 C18,37.6568542 16.6568542,39 15,39 L15,39 L15,39 C13.3431458,39 12,37.6568542 12,36 L12,0 Z" fill="#F8C865"></path>
                                                    <rect fill="#F8C865" x="0" y="36" width="30" height="3" rx="1"></rect>
                                                    <rect fill="#F8C865" x="3" y="34" width="24" height="3" rx="1"></rect>
                                                    <rect fill="#E5B854" x="3" y="35" width="24" height="1"></rect>
                                                    <rect fill="#E5B854" x="12" y="33" width="6" height="1"></rect>
                                                </g>
                                                <g transform="translate(11.000000, 0.000000)">
                                                    <path d="M15,40 L21,40 L21,41.4285714 C19.9982973,41.8095238 18.9976791,42 17.9981452,42 C16.9986112,42 15.9992295,41.8095238 15,41.4285714 L15,40 Z" fill="#E5B854"></path>
                                                    <path d="M1,2 L35,2 L35,24 L35,24 C35,33.3888407 27.3888407,41 18,41 L18,41 L18,41 C8.61115925,41 1,33.3888407 1,24 L1,2 Z" fill="#F8C865"></path>
                                                    <path d="M1,2 L3.97995608,2 C3.77812292,12.539029 3.77812292,19.4034557 3.97995608,22.5932802 C4.33107931,28.1425244 6.02765905,31.9537678 6.97217231,33.0221206 C11.0480866,37.6324471 14.0325532,38.9114726 17.0011701,39.6601082 C17.8083157,39.8636569 19.0562321,40.1096768 20.7449192,40.3981682 L20.7449192,40.3981682 L20.7449192,40.3981682 C20.8931722,40.3984671 21.0131127,40.5188922 21.0128138,40.6671452 C21.0125193,40.8131894 20.8955226,40.9322021 20.7495047,40.9349914 L17.3462378,41 L17.3462378,41 L17.3462378,41 C8.31845995,41 1,33.6815401 1,24.6537622 L1,2 Z" fill-opacity="0.6" fill="#D9AE4A"></path>
                                                    <rect fill="#E5B854" x="1" y="1" width="34" height="3"></rect>
                                                    <rect fill="#F8C865" x="0" y="0" width="36" height="3" rx="1.5"></rect>
                                                </g>
                                                <g transform="translate(22.000000, 11.000000)">
                                                    <path d="M1.91505498,11.7165711 C0.850022383,11.7165711 0.317506086,11.7165711 0.317506086,11.7165711 C0.317506086,11.7165711 -0.0922105915,16.8753718 6.68736704,16.8753718 C13.4669447,16.8753718 13.0675582,12.1719335 13.0675582,11.7165711 C13.0675582,11.2612086 13.2351422,8.34933414 6.6923685,7.30240798 C1.0176127,6.3943756 4.52296145,1.70934839 8.19114123,3.78573199 C8.86913832,4.16951417 9.50113453,5.27512628 9.68500222,5.49666984 C9.80758067,5.64436556 10.6704568,5.65352084 12.2736307,5.52413569 C11.992853,2.26483166 10.1307651,0.635179654 6.68736704,0.635179654 C1.52227001,0.635179654 0.578574667,3.7458634 0.578574667,5.52413569 C0.578574667,7.30240798 2.20896023,9.70438994 6.68736704,10.2869894 C11.1657738,10.8695889 10.5792189,14.1854188 6.68736704,14.1854188 C2.79551516,14.1854188 4.19420039,11.7488463 3.50972895,11.7165711 C3.05341466,11.6950543 2.52185667,11.6950543 1.91505498,11.7165711 Z" fill="#E5B854"></path>
                                                    <path d="M2.55141861,11.0869414 C1.48638602,11.0869414 0.953869722,11.0869414 0.953869722,11.0869414 C0.953869722,11.0869414 0.544153045,16.2457421 7.32373067,16.2457421 C14.1033083,16.2457421 13.7039218,11.5423039 13.7039218,11.0869414 C13.7039218,10.631579 13.8715058,7.71970451 7.32873214,6.67277835 C1.65397634,5.76474597 5.15932509,1.07971876 8.82750487,3.15610236 C9.50550196,3.53988454 10.1374982,4.64549665 10.3213659,4.86704021 C10.4439443,5.01473593 11.3068205,5.02389121 12.9099944,4.89450606 C12.6292166,1.63520203 10.7671287,0.00555002426 7.32373067,0.00555002426 C2.15863364,0.00555002426 1.2149383,3.11623377 1.2149383,4.89450606 C1.2149383,6.67277835 2.84532387,9.07476031 7.32373067,9.65735977 C11.8021375,10.2399592 11.2155826,13.5557892 7.32373067,13.5557892 C3.4318788,13.5557892 4.83056402,11.1192166 4.14609259,11.0869414 C3.68977829,11.0654246 3.1582203,11.0654246 2.55141861,11.0869414 Z" fill="#FFFFFF"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    POINTS</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex text-" style="justify-content: space-around; align-items: center;">
                                <div class="text-center text-secondary">
                                    <p class="text-center font-weight-bold" style="font-size: 18px;">
                                        <?php is($data['user_total_points']) and print ($data['user_total_points']) or print('0'); ?>
                                    </p>
                                    <span style="font-size: 14px;">this month</span>
                                </div>
                                <div class="text-center text-secondary">
                                    <p class="text-center font-weight-bold" style="font-size: 18px;">0</p>
                                    <span style="font-size: 14px;">last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-4 w100-mobile-xs" style="width: 40%;">
                        <div class="card-header bg-white">
                            <div class="d-flex" style="justify-content: space-between; align-items: center;">
                                <span class="text-secondary">
                                    <svg height="24px" viewBox="0 0 66 84">
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
                                    <span class="ml-1"><?php echo (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $data['user']['id']) ? 'YOUR' : strtoupper($data['user']['first_name']) ?> DOCUMENTS</span></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex text-" style="justify-content: space-around; align-items: center;">
                                <div class="text-center text-secondary">
                                    <p class="text-center font-weight-bold" style="font-size: 18px;">
                                       <?php is($data['total_user_uploaded_doc'], 'show') or print('0'); ?>
                                    </p>
                                    <span style="font-size: 14px;">upload</span>
                                </div>
                                <div class="text-center text-secondary">
                                    <p class="text-center font-weight-bold" style="font-size: 18px;"><?php is($data['total_likes_user_get'], 'show') or print('0'); ?></p></p>
                                    <span style="font-size: 14px;">upvotes</span>
                                </div>
                                <div class="text-center text-secondary">
                                    <p class="text-center font-weight-bold" style="font-size: 18px;"><?php is($data['total_comments_count_user_get'], 'show') or print('0'); ?></p>
                                    <span style="font-size: 14px;">comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w100-mobile-xs" style="width: 15%;">
                        <div class="card-header bg-white">
                            <div class="d-flex" style="justify-content: space-between; align-items: center;">
                                <span class="text-secondary">
                                    <svg width="20px" style="color: rgb(221, 75, 57)" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                                    </svg>
                                    <span class="ml-1">IMPACT</span></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-secondary">
                                <p class="text-center font-weight-bold" style="font-size: 18px;"><?php echo $data['total_viewed_doc'] ?></p>
                                <span style="font-size: 14px;">students helped</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $data['user']['id']) { ?>
<section class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center text-secondary" style="font-size: 14px;">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" width="16px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                    </svg>
                    You have until the end of October to upload and earn points for the November lottery!
                    <a href="<?php echo SITE_URL; ?>upload" class="btn-sm btn btn-primary text-white rounded">
                        <svg width="18" height="18" class="mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"></path>
                        </svg> Upload documents
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<?php } ?>
    <section class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (is($data['upload_docs'])) : ?>
                        <h5 class="text-secondary mb-3">
                            My uploads
                        </h5>
    
                        <div class="card">
                            <div class="card-header bg-white">
                                <div class="row">
                                    <div class="col-5">
                                        <span class="text-secondary">NAME</span>
                                    </div>
                                    <div class="col-3">
                                        <span class="text-secondary">VIEWS</span>
                                    </div>
                                    <div class="col-3">
                                        <span class="text-secondary">RATINGS</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="list-group list-group-flush">
                                    <?php if (is($data['upload_docs'], 'array')) foreach ($data['upload_docs'] as $doc) : ?>
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-5">
                                                    <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                        <svg class="ic ic-document" height="20px" viewBox="0 0 66 84">
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
                                                        <span class="ml-1">
                                                            <?php is($doc->title, 'showCapital'); ?>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-3">
                                                    <span class="text-secondary font-weight-bold">
                                                        <?php is($doc->views, 'show') or print('0'); ?>
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-secondary">
                                                        <svg width="16px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                        </svg>
                                                        <span class="ml-1">None</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-primary">
                            <span>User not upload any Documents yet.</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php
if (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $data['user']['id']) { ?>
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-2">
                    <h5 class="mb-1 text-secondary">My Courses and Books</h5>
                    <hr class="border-bottom mb-1">
    
                    <ul class="list-unstyled">
                        <?php foreach ($data['my_courses'] as $course) : ?>
                            <li class="media border-bottom my-1 py-3 px-3">
                                <div class="col-md-1">
                                    <div class="mr-3">
                                        <svg class="ic ic-course ic-course--small" width="25" height="24" viewBox="0 0 16 12">
                                            <g fill="none" fill-rule="evenodd">
                                                <path fill=" #91bbd7" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                <rect width="16" height="11" y="1" fill=" #91bbd7" rx="2"></rect>
                                                <rect width="16" height="10" y="2" fill="#569eba" rx="1"></rect>
                                                <rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
                                                <rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="media-body pt-1">
                                        <a class="mt-0 mb-1 text-dark" href="<?php echo SITE_URL; ?>course/<?php is($course->university_slug, 'show') ?>/<?php is($course->slug, 'show') ?>">
                                            <?php is($course->title, 'showCapital'); ?>
                                            <span class="ml-1 text-secondary">
                                                <?php is($course->course_code, 'show'); ?>
                                            </span>
                                            (Course)
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <a href="<?php echo SITE_URL. 'remove-to-my-course/'.$course->university_slug.'/'.$course->slug.'/'.$course->id ?>">Remove</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                     <ul class="list-unstyled">
                        <?php foreach ($data['my_books'] as $books) : ?>
                            <li class="media border-bottom my-1 py-3 px-3">
                                <div class="col-md-1">
                                    <div class="mr-3">
                                        <svg class="ic ic-course ic-course--small" width="25" height="24" viewBox="0 0 16 12">
                                            <g fill="none" fill-rule="evenodd">
                                                <path fill=" #91bbd7" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                <rect width="16" height="11" y="1" fill=" #91bbd7" rx="2"></rect>
                                                <rect width="16" height="10" y="2" fill="#569eba" rx="1"></rect>
                                                <rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
                                                <rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="media-body pt-1">
                                        <a class="mt-0 mb-1 text-dark" href="<?php echo SITE_URL; ?>book/<?php is($books->slug, 'show') ?>">
                                            <?php is($books->title, 'showCapital'); ?> (Book)
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?php echo SITE_URL . 'remove-to-my-book/' . $books->slug . '/' . $books->id ?>">Remove</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-2">
                    <h5>Studylists</h5>
                    <hr class="border-bottom">
    
                    <ul class="list-unstyled">
                         <?php if (is($data['studyLists'])) foreach ($data['studyLists'] as $studyList) : ?>
                            <li class="media border-bottom my-1 py-3">
                                <div class="mr-3">
                                    <svg height="22" viewBox="0 0 56 42">
                                        <g fill="none" fill-rule="evenodd">
                                            <path fill="#D35D3D" fill-rule="nonzero" d="M6.69445239,8.70830503 C7.15899767,8.23610168 7.853442,8 8.77778539,8 L53.2222227,8 C54.1481484,8 54.8425928,8.23610168 55.3055557,8.70830503 C55.7685186,9.18050838 56,9.8888134 56,10.8332201 L53.7777781,36.3322011 C53.5389935,38.1908463 52.8940743,39.6074564 51.8430204,40.5820312 C50.7919665,41.5566061 49.399849,42.0288094 47.666668,41.9986413 L29.6755434,41.9986413 L6.00000806,27.8325407 L6.00000806,10.8332201 C5.99842567,9.8888134 6.22990711,9.18050838 6.69445239,8.70830503 Z"></path>
                                            <path fill="#15689E" fill-rule="nonzero" d="M17.7083335,0.692307692 C18.1808043,0.230769231 18.8891376,0 19.8333335,0 L48.1666667,0 C49.1111111,3.44519285e-13 49.8194445,0.230769231 50.2916667,0.692307692 C50.7638889,1.15384615 51,1.84615385 51,2.76923077 L51,36 L17,36 L17.0000002,2.76923077 C16.9997517,1.84615385 17.2358628,1.15384615 17.7083335,0.692307692 Z"></path>
                                            <path fill="#0088D7" fill-rule="nonzero" d="M11.7086594,5.71428571 C12.1811255,5.23809524 12.8894519,5 13.8336386,5 L42.1666944,5 C43.1111296,5 43.819456,5.23809524 44.2916736,5.71428571 C44.7638912,6.19047619 45,6.9047619 45,7.85714286 L45,25 L11,25 L11.000333,7.85714286 C11.0000845,6.9047619 11.2361933,6.19047619 11.7086594,5.71428571 Z"></path>
                                            <path fill="#FFF" fill-rule="nonzero" d="M16.4166667 10L30.5833333 10C31.5277778 10 32 10.5 32 11.5 32 12.5 31.5277778 13 30.5833333 13L16.4166667 13C15.4722222 13 15 12.5 15 11.5 15 10.5 15.4722222 10 16.4166667 10zM17.8333333 15L36.1666667 15C37.3888889 15 38 15.5 38 16.5 38 17.5 37.3888889 18 36.1666667 18L17.8333333 18C16.6111111 18 16 17.5 16 16.5 16 15.5 16.6111111 15 17.8333333 15z" opacity=".503"></path>
                                            <path fill="#FF9676" fill-rule="nonzero" d="M2.78947368,39.2012641 C2.8860567,39.9344427 3.18459415,40.5465209 3.68508604,41.0374987 C4.18557793,41.5284765 4.81686504,41.8464241 5.57894737,41.9913414 L50.2105263,42 C51.1403509,41.95104 51.8377193,41.6245208 52.3026316,41.0204424 C52.7675439,40.416364 53,39.8099713 53,39.2012641 L50.2105263,22.4116887 C49.9288071,21.4634563 49.6033685,20.8094712 49.2342105,20.4497333 C48.6804735,19.9101266 48.0588123,19.6101126 47.4210526,19.6101126 C47.0063762,19.6101126 38.1513343,19.6101126 20.8559272,19.6101126 C20.4181314,19.6101126 19.918245,19.4079883 19.6657895,19.2034954 C19.4133339,18.9990025 19.2768112,18.7250678 19.1542985,18.3243252 C18.2729609,15.4414417 17.7370959,14 16.7421016,14 C16.0787721,14 11.4278962,14 2.78947368,14 C1.85838876,14.0084565 1.16144992,14.2458981 0.698657152,14.7123247 C0.235864387,15.1787513 0.0029786696,15.8784353 0,16.8113766 L2.78947368,39.2012641 Z"></path>
                                            <path fill="#FFF" d="M33.3525987,29.8620324 L20.1564635,36.6859032 C19.8484212,36.8430926 19.6,36.7043961 19.6,36.3807708 L19.6,22.770015 C19.6,22.4463897 19.8484212,22.3076931 20.1564635,22.4648826 L33.3525987,29.2887533 C33.660641,29.4459428 33.660641,29.704843 33.3525987,29.8620324 Z" transform="rotate(-7 26.592 29.575)"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="media-body pt-1">
                                    <a class="mt-0 mb-1 text-dark" href="<?php echo SITE_URL; ?>studylist/<?php is($studyList->id, 'show') ?>">
                                        <?php is($studyList->title, 'showCapital'); ?>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php } ?>