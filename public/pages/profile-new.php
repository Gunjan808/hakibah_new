<style>
    /*@media (max-width: 767px){*/
    /*    .w100-mobile-xs{*/
    /*        width: 100% !important;*/
    /*        margin: 20px 0 !important;*/
    /*    }*/
    /*    .d-flex-custom{*/
    /*        display: initial !important;*/
    /*    }*/
    /*    .d-flex-custom-profile {*/
    /*        display: flex !important;*/
    /*        flex-direction: column;*/
    /*        justify-content: center;*/
    /*        align-items: center;*/
    /*        margin: 0;*/
    /*    }*/
    /*    .d-flex-custom-profile .ml-5{*/
    /*        margin-left: 0 !important;   */
    /*    }*/
    /*}*/
    .success-sec {
        display: inline-block;
        position: relative;
        margin: 35px auto 0;
        border: 2px solid #17b862;
        border-radius: 3px;
        padding: 40px 30px 30px;
        text-align: center;
    }

    .reward-title {
        display: flex;
        position: absolute;
        top: 0;
        left: 50%;
        align-items: center;
        justify-content: center;
        transform: translate(-50%, -50%);
        border: 5px solid #fff;
        border-radius: 50%;
        background: #17b862;
        width: 70px;
        height: 70px;
        color: #fff;
        font-size: 25px;
        font-weight: 700;
        -o-transform: translate(-50%, -50%);
    }
</style>

<!-- Breadcrumb Section -->
<!--<section class="py-1 bg-light">-->
<!--    <div class="container">-->
<!--        <div class="row my-4">-->
<!--            <div class="col-md-12 d-inline-flex d-flex-custom d-flex-custom-profile">-->
<!--                <div class="rounded-circle bg-warning p-1 text-center mr-3 d-flex" style="width: 100px; height:100px;align-items: center; justify-content: center;">-->
<!--                    <span class="text-white h1">-->
<!--                        <?php is($data['user']['first_name']) and print(substr($data['user']['first_name'], 0, 1)) ?>-->
<!--                    </span>-->
<!--                </div>-->
<!--                <div class="ml-5">-->
<!--                    <h2 class="font-weight-bold text-secondary">-->
<!--                        <?php echo (isset($data['user']['first_name'])) ? ucfirst($data['user']['first_name']) : '';  ?>&nbsp;<?php echo (isset($data['user']['last_name'])) ? ucfirst($data['user']['last_name']) : '';  ?>-->
<!--                    </h2>-->
<!--                    <a class="text-decoration-none mb-2 d-block" href="<?php echo SITE_URL ?>institution/<?php is($data['university']->slug, 'show') ?>">-->
<!--                        <?php is($data['university']->title, 'showCapital'); ?>-->
<!--                    </a>-->
<!--                    <span class="text-secondary">Level <span class="badge badge-warning text-white">-->
<!--                            <?php is($data['total']->total_upload, 'show') or print('0'); ?>-->
<!--                        </span> Contribute</span>-->
<!--                </div>-->

<!--                <div class="card mr-3 ml-auto w-25 w100-mobile-xs">-->
<!--                    <div class="card-header bg-white">-->
<!--                        <div class="d-flex" style="justify-content: space-between; align-items: center;">-->
<!--                            <span class="text-secondary">TOTAL POINTS</span>-->
<!--                            <h4 class="font-weight-bold">-->
<!--                                <?php is($data['total']->total_upload) and print ($data['total']->total_upload * 50) or print('0'); ?>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <div class="d-flex text-" style="justify-content: space-between; align-items: center;">-->
<!--                            <span style="font-size: 16px;">Level-->
<!--                                <?php is($data['total']->total_upload, 'show') or print('0'); ?>-->
<!--                            </span>-->
<!--                            <span style="font-size: 14px;">-->
<!--                                <?php is($data['total']->total_upload) and print (($data['total']->total_upload * 50) + 50) or print('50'); ?>-->
<!--                                point to Level-->
<!--                                <?php is($data['total']->total_upload) and print ($data['total']->total_upload + 1) or print('1'); ?></span>-->
<!--                        </div>-->
<!--                        <div class="progress mt-1" style="height: .3rem;">-->
<!--                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="py-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                <div class="media d-flex align-items-center">
                    <img class="mr-3" src="http://developmentconsole.tech/hakibah/uploads/setting/high-five.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <h2 class="mt-0">High five!</h2>
                        Thanks for sharing your documents! We'll publish them within a few minutes.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<h4 class="green-text font-weight-bold text-center mb-3 mt-3">
    You just earned:
</h4>
<section class="py-4 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-inline-flex w-100 d-flex-custom">
                    <!-- <div class="card w100-mobile-xs" style="width: 33%;">
                        <div class="card-body">
                            <div class="media">
                                <svg class="ic ic-ticket mr-3" width="21px" height="30px" viewBox="0 0 21 30"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-207.000000, -342.000000)"><g transform="translate(185.000000, 251.000000)"><g transform="translate(0.000000, 60.000000)"><g><g><g transform="translate(22.000000, 31.000000)"><g><rect fill="#5BC787" x="0" y="2" width="21" height="26"></rect><polygon fill="#FFFFFF" points="10.5 18.6745633 7.10081306 20.4616217 7.75 16.6765714 5 13.9959839 8.80040653 13.4437525 10.5 10 12.1995935 13.4437525 16 13.9959839 13.25 16.6765714 13.8991869 20.4616217"></polygon><g fill="#5BC787"><path d="M1.5,0 L3,2 L0,2 L1.5,0 Z M4.5,0 L6,2 L3,2 L4.5,0 Z M7.5,0 L9,2 L6,2 L7.5,0 Z M10.5,0 L12,2 L9,2 L10.5,0 Z M13.5,0 L15,2 L12,2 L13.5,0 Z M16.5,0 L18,2 L15,2 L16.5,0 Z M19.5,0 L21,2 L18,2 L19.5,0 Z"></path></g><g transform="translate(10.500000, 29.000000) rotate(-180.000000) translate(-10.500000, -29.000000) translate(0.000000, 28.000000)" fill="#5BC787"><path d="M1.5,0 L3,2 L0,2 L1.5,0 Z M4.5,0 L6,2 L3,2 L4.5,0 Z M7.5,0 L9,2 L6,2 L7.5,0 Z M10.5,0 L12,2 L9,2 L10.5,0 Z M13.5,0 L15,2 L12,2 L13.5,0 Z M16.5,0 L18,2 L15,2 L16.5,0 Z M19.5,0 L21,2 L18,2 L19.5,0 Z"></path></g></g></g></g></g></g></g></g></g></svg>
                                <div class="media-body">
                                    <h5 class="mt-0"><strong>1 lottery ticket!</strong></h5>
                                    Every document earns you a ticket in the monthly lottery.
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card mx-4 w100-mobile-xs" style="width: 33%;">
                        <div class="card-body">
                            <div class="media">
                                <svg class="icon--iGMs1 big--1-Sn- mr-3" width="16" height="16" viewBox="0 0 16 16">
                                    <g fill="none" fill-rule="evenodd">
                                        <path fill="#EFA812" d="M5.75915967,2.43613514 C6.98018823,1.25782979 7.96757794,0.367020036 8.12279154,0.367020036 C8.27548083,0.367020036 9.23349829,1.22712198 10.4270371,2.37499461 C12.0613837,2.36769368 13.3119145,2.3767038 13.3510107,2.39709305 C13.4646796,2.4563731 13.5720104,2.61088911 13.5901497,2.62902838 C13.703997,2.7428757 13.7749823,4.06592638 13.8065313,5.75631637 C14.9838296,6.98080946 15.8734748,7.96949141 15.8734748,8.11770325 C15.8734748,8.26505674 14.9810494,9.24317359 13.8013805,10.4578395 C13.7666008,12.1566175 13.6950327,13.4852667 13.5901497,13.5901497 C13.4857997,13.6944997 12.1593342,13.755118 10.4626545,13.7797945 C9.22914957,14.9677774 8.24101071,15.8683865 8.12279154,15.8683865 C8.00431811,15.8683865 7.01217893,14.9618295 5.77496619,13.7680977 C4.05573829,13.7359864 2.71285855,13.6739799 2.62902838,13.5901497 C2.59520114,13.5563225 2.38941172,13.5442652 2.36359756,13.1580398 C2.32150255,12.528224 2.30340832,11.4906103 2.30428444,10.3060345 C1.19467853,9.15892772 0.372108328,8.25358798 0.372108328,8.11770325 C0.372108328,7.97765658 1.23305687,7.02029865 2.38185282,5.82330446 C2.44093844,4.08674723 2.52897934,2.72907742 2.62902838,2.62902838 C2.71844844,2.53960832 4.05658061,2.47706707 5.75915967,2.43613514 Z"></path>
                                        <path fill="#F8C865" d="M5.55069891,2.20661633 C6.766784,1.03344382 7.74885423,0.147841954 7.90361346,0.147841954 C8.05834109,0.147841954 9.04004204,1.03106122 10.2557834,2.20193996 C11.9431615,2.23232262 13.2616342,2.30051288 13.3709716,2.4098503 C13.4805072,2.51938593 13.5501788,3.8410121 13.5818503,5.53141522 C14.7618782,6.75854965 15.6542967,7.75008249 15.6542967,7.89852517 C15.6542967,8.04600646 14.7603226,9.02569284 13.5791322,10.2418225 C13.5457436,11.9391148 13.4757289,13.2662143 13.3709716,13.3709716 C13.2666216,13.4753217 11.9401561,13.5359399 10.2434764,13.5606164 C9.00997149,14.7485993 8.02183263,15.6492084 7.90361346,15.6492084 C7.78514003,15.6492084 6.79300085,14.7426514 5.55578811,13.5489196 C3.83656021,13.5168083 2.49368047,13.4548018 2.4098503,13.3709716 C2.32633566,13.287457 2.26593521,11.9528981 2.23510123,10.2415954 C1.05044135,9.02196152 0.152930246,8.04046493 0.152930246,7.89852517 C0.152930246,7.75594227 1.04534449,6.76617725 2.2253682,5.53886178 C2.25009951,3.8388204 2.30948583,2.51021477 2.4098503,2.4098503 C2.51080742,2.30889318 3.84516046,2.24000621 5.55069891,2.20661633 Z"></path>
                                        <path fill="#F9BD31" d="M2.4065819,13.3670499 L13.3769456,2.41707715 C13.4830447,2.56788532 13.5507585,3.87194925 13.5818503,5.53141522 C14.7618782,6.75854965 15.6542967,7.75008249 15.6542967,7.89852517 C15.6542967,8.04600646 14.7603226,9.02569284 13.5791322,10.2418225 C13.5457436,11.9391148 13.4757289,13.2662143 13.3709716,13.3709716 C13.2666216,13.4753217 11.9401561,13.5359399 10.2434764,13.5606164 C9.00997149,14.7485993 8.02183263,15.6492084 7.90361346,15.6492084 C7.78514003,15.6492084 6.79300085,14.7426514 5.55578811,13.5489196 C3.83656021,13.5168083 2.49368047,13.4548018 2.4098503,13.3709716 C2.40875687,13.3698782 2.40766739,13.3685703 2.4065819,13.3670499 Z"></path>
                                        <path fill="#EFA812" d="M7.96978087,10.3051567 C8.93371142,10.3051567 9.39943068,10.0018976 9.3886,9.39537953 C9.3886,9.03796708 9.17198639,8.79969211 8.71709781,8.66972394 C8.2838706,8.53975578 7.7856593,8.40978761 7.25495596,8.26898877 C5.81447546,7.90074563 5.09965056,7.22924345 5.09965056,6.25448221 C5.1321426,4.70569491 6.05275043,3.94754728 7.87230474,3.95837796 C9.60521361,3.95837796 10.5041601,4.71652559 10.5908055,6.24365153 L9.74601245,6.24365153 C9.43192272,6.24365153 9.21530911,6.092022 9.07451027,5.81042431 C8.82540462,5.38802778 8.38134672,5.18224485 7.74233658,5.18224485 C6.96252759,5.19307553 6.57262309,5.4855039 6.54013105,6.04869928 C6.54013105,6.51441854 7.00585031,6.85016963 7.96978087,7.06678324 C8.52214557,7.1967514 9.10700231,7.35921161 9.72435109,7.57582522 C10.5474828,7.85742291 10.9373873,8.46394101 10.8940646,9.39537953 C10.8074191,10.83586 9.8326579,11.5506849 7.96978087,11.5506849 C6.02025839,11.5506849 5.03466647,10.7383839 4.99134375,9.1354432 L6.45348561,9.1354432 C6.50763901,9.91525219 7.00585031,10.3051567 7.96978087,10.3051567 Z"></path>
                                    </g>
                                </svg>
                                <div class="media-body">
                                    <h5 class="mt-0"><strong>Premium access!</strong></h5>
                                    You just received <?= $data['points']['option_value'] ?> points on document upload .
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card w100-mobile-xs" style="width: 33%;">
                        <div class="card-body">
                            <div class="media">
                                <svg class="ic ic-heart mr-3" width="24" height="22" viewBox="0 0 24 22">
                                    <path fill="#DD4B39" d="M17.4,0 C21.096,0 24,2.9013624 24,6.59400545 C24,11.1258856 19.92,14.8185286 13.74,20.4174387 L12,22 L10.26,20.4294278 C4.08,14.8185286 0,11.1258856 0,6.59400545 C0,2.9013624 2.904,0 6.6,0 C8.688,0 10.692,0.97111717 12,2.50572207 C13.308,0.97111717 15.312,0 17.4,0 Z"></path>
                                </svg>
                                <div class="media-body">
                                    <h5 class="mt-0"><strong>Karma!</strong></h5>
                                    Your documents are helping students all over the world!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- OLD PROFILE PAGE CODE START -->
                <!--<div class="d-inline-flex w-100 d-flex-custom">-->
                <!--    <div class="card w100-mobile-xs" style="width: 40%;">-->
                <!--        <div class="card-header bg-white">-->
                <!--            <div class="d-flex" style="justify-content: space-between; align-items: center;">-->
                <!--                <span class="text-secondary">-->
                <!--                    <svg width="28px" height="23px" viewBox="0 0 58 53">-->
                <!--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                <!--                            <g>-->
                <!--                                <g transform="translate(0.000000, 7.000000)" stroke="#F8C865" stroke-width="4">-->
                <!--                                    <path d="M14,20 L14,2 L10,2 C5.581722,2 2,5.581722 2,10 L2,11 C2,15.9705627 6.02943725,20 11,20 L14,20 Z"></path>-->
                <!--                                    <path d="M56,20 L56,2 L52,2 C47.581722,2 44,5.581722 44,10 L44,11 C44,15.9705627 48.0294373,20 53,20 L56,20 Z" transform="translate(50.000000, 11.000000) scale(-1, 1) translate(-50.000000, -11.000000) "></path>-->
                <!--                                </g>-->
                <!--                                <g transform="translate(14.000000, 14.000000)">-->
                <!--                                    <path d="M12,0 L18,0 L18,36 L18,36 C18,37.6568542 16.6568542,39 15,39 L15,39 L15,39 C13.3431458,39 12,37.6568542 12,36 L12,0 Z" fill="#F8C865"></path>-->
                <!--                                    <rect fill="#F8C865" x="0" y="36" width="30" height="3" rx="1"></rect>-->
                <!--                                    <rect fill="#F8C865" x="3" y="34" width="24" height="3" rx="1"></rect>-->
                <!--                                    <rect fill="#E5B854" x="3" y="35" width="24" height="1"></rect>-->
                <!--                                    <rect fill="#E5B854" x="12" y="33" width="6" height="1"></rect>-->
                <!--                                </g>-->
                <!--                                <g transform="translate(11.000000, 0.000000)">-->
                <!--                                    <path d="M15,40 L21,40 L21,41.4285714 C19.9982973,41.8095238 18.9976791,42 17.9981452,42 C16.9986112,42 15.9992295,41.8095238 15,41.4285714 L15,40 Z" fill="#E5B854"></path>-->
                <!--                                    <path d="M1,2 L35,2 L35,24 L35,24 C35,33.3888407 27.3888407,41 18,41 L18,41 L18,41 C8.61115925,41 1,33.3888407 1,24 L1,2 Z" fill="#F8C865"></path>-->
                <!--                                    <path d="M1,2 L3.97995608,2 C3.77812292,12.539029 3.77812292,19.4034557 3.97995608,22.5932802 C4.33107931,28.1425244 6.02765905,31.9537678 6.97217231,33.0221206 C11.0480866,37.6324471 14.0325532,38.9114726 17.0011701,39.6601082 C17.8083157,39.8636569 19.0562321,40.1096768 20.7449192,40.3981682 L20.7449192,40.3981682 L20.7449192,40.3981682 C20.8931722,40.3984671 21.0131127,40.5188922 21.0128138,40.6671452 C21.0125193,40.8131894 20.8955226,40.9322021 20.7495047,40.9349914 L17.3462378,41 L17.3462378,41 L17.3462378,41 C8.31845995,41 1,33.6815401 1,24.6537622 L1,2 Z" fill-opacity="0.6" fill="#D9AE4A"></path>-->
                <!--                                    <rect fill="#E5B854" x="1" y="1" width="34" height="3"></rect>-->
                <!--                                    <rect fill="#F8C865" x="0" y="0" width="36" height="3" rx="1.5"></rect>-->
                <!--                                </g>-->
                <!--                                <g transform="translate(22.000000, 11.000000)">-->
                <!--                                    <path d="M1.91505498,11.7165711 C0.850022383,11.7165711 0.317506086,11.7165711 0.317506086,11.7165711 C0.317506086,11.7165711 -0.0922105915,16.8753718 6.68736704,16.8753718 C13.4669447,16.8753718 13.0675582,12.1719335 13.0675582,11.7165711 C13.0675582,11.2612086 13.2351422,8.34933414 6.6923685,7.30240798 C1.0176127,6.3943756 4.52296145,1.70934839 8.19114123,3.78573199 C8.86913832,4.16951417 9.50113453,5.27512628 9.68500222,5.49666984 C9.80758067,5.64436556 10.6704568,5.65352084 12.2736307,5.52413569 C11.992853,2.26483166 10.1307651,0.635179654 6.68736704,0.635179654 C1.52227001,0.635179654 0.578574667,3.7458634 0.578574667,5.52413569 C0.578574667,7.30240798 2.20896023,9.70438994 6.68736704,10.2869894 C11.1657738,10.8695889 10.5792189,14.1854188 6.68736704,14.1854188 C2.79551516,14.1854188 4.19420039,11.7488463 3.50972895,11.7165711 C3.05341466,11.6950543 2.52185667,11.6950543 1.91505498,11.7165711 Z" fill="#E5B854"></path>-->
                <!--                                    <path d="M2.55141861,11.0869414 C1.48638602,11.0869414 0.953869722,11.0869414 0.953869722,11.0869414 C0.953869722,11.0869414 0.544153045,16.2457421 7.32373067,16.2457421 C14.1033083,16.2457421 13.7039218,11.5423039 13.7039218,11.0869414 C13.7039218,10.631579 13.8715058,7.71970451 7.32873214,6.67277835 C1.65397634,5.76474597 5.15932509,1.07971876 8.82750487,3.15610236 C9.50550196,3.53988454 10.1374982,4.64549665 10.3213659,4.86704021 C10.4439443,5.01473593 11.3068205,5.02389121 12.9099944,4.89450606 C12.6292166,1.63520203 10.7671287,0.00555002426 7.32373067,0.00555002426 C2.15863364,0.00555002426 1.2149383,3.11623377 1.2149383,4.89450606 C1.2149383,6.67277835 2.84532387,9.07476031 7.32373067,9.65735977 C11.8021375,10.2399592 11.2155826,13.5557892 7.32373067,13.5557892 C3.4318788,13.5557892 4.83056402,11.1192166 4.14609259,11.0869414 C3.68977829,11.0654246 3.1582203,11.0654246 2.55141861,11.0869414 Z" fill="#FFFFFF"></path>-->
                <!--                                </g>-->
                <!--                            </g>-->
                <!--                        </g>-->
                <!--                    </svg>-->
                <!--                    POINTS</span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex text-" style="justify-content: space-around; align-items: center;">-->
                <!--                <div class="text-center text-secondary">-->
                <!--                    <p class="text-center font-weight-bold" style="font-size: 18px;">-->
                <!--                        <?php is($data['total']->total_upload) and print ($data['total']->total_upload * 50) or print('0'); ?>-->
                <!--                    </p>-->
                <!--                    <span style="font-size: 14px;">this month</span>-->
                <!--                </div>-->
                <!--                <div class="text-center text-secondary">-->
                <!--                    <p class="text-center font-weight-bold" style="font-size: 18px;">0</p>-->
                <!--                    <span style="font-size: 14px;">last month</span>-->
                <!--                </div>-->
                <!--                <div class="text-center text-secondary">-->
                <!--                    <p class="text-center font-weight-bold" style="font-size: 18px;">0</p>-->
                <!--                    <span style="font-size: 14px;">ticket</span>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="card mx-4 w100-mobile-xs" style="width: 40%;">-->
                <!--        <div class="card-header bg-white">-->
                <!--            <div class="d-flex" style="justify-content: space-between; align-items: center;">-->
                <!--                <span class="text-secondary">-->
                <!--                    <svg height="24px" viewBox="0 0 66 84">-->
                <!--                        <defs>-->
                <!--                            <linearGradient x1="7.72138756%" y1="26.8474028%" x2="49.6088576%" y2="99.2035081%">-->
                <!--                                <stop stop-color="#01d773" stop-opacity="0.325294384" offset="0%"></stop>-->
                <!--                                <stop stop-color="#00c563" offset="100%"></stop>-->
                <!--                            </linearGradient>-->
                <!--                            <filter x="0.0%" y="0.0%" width="100.0%" height="100.0%" filterUnits="objectBoundingBox">-->
                <!--                                <feGaussianBlur stdDeviation="0" in="SourceGraphic"></feGaussianBlur>-->
                <!--                            </filter>-->
                <!--                        </defs>-->
                <!--                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                <!--                            <g>-->
                <!--                                <path d="M3,0 L48,0 L66,18 L66,81 C66,82.6568542 64.6568542,84 63,84 L3,84 C1.34314575,84 2.02906125e-16,82.6568542 0,81 L0,3 C-2.02906125e-16,1.34314575 1.34314575,3.04359188e-16 3,0 Z" fill="#12d66d"></path>-->
                <!--                                <g transform="translate(11.000000, 29.000000)" fill="#FFFFFF">-->
                <!--                                    <rect x="0" y="0" width="25" height="3" rx="1.5"></rect>-->
                <!--                                    <rect x="0" y="11" width="44" height="3" rx="1.5"></rect>-->
                <!--                                    <rect x="0" y="22" width="44" height="3" rx="1.5"></rect>-->
                <!--                                </g>-->
                <!--                                <g transform="translate(48.000000, 0.000000)">-->
                <!--                                    <path d="M-4.54747351e-13,0 L18,18 L4,18 C1.790861,18 -4.54476809e-13,16.209139 -4.54747351e-13,14 L-4.54747351e-13,0 Z" fill="#b7f2d6"></path>-->
                <!--                                    <polygon fill="url(#linearGradient-1)" filter="url(#filter-2)" transform="translate(11.000000, 24.000000) scale(-1, -1) translate(-11.000000, -24.000000) " points="4 18 18 30 4 30"></polygon>-->
                <!--                                </g>-->
                <!--                            </g>-->
                <!--                        </g>-->
                <!--                    </svg>-->
                <!--                    <span class="ml-1"><?php echo (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $data['user']['id']) ? 'YOUR' : strtoupper($data['user']['first_name']) ?> DOCUMENTS</span></span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex text-" style="justify-content: space-around; align-items: center;">-->
                <!--                <div class="text-center text-secondary">-->
                <!--                    <p class="text-center font-weight-bold" style="font-size: 18px;">-->
                <!--                        <?php is($data['total']->total_upload, 'show') or print('0'); ?>-->
                <!--                    </p>-->
                <!--                    <span style="font-size: 14px;">upload</span>-->
                <!--                </div>-->
                <!--                <div class="text-center text-secondary">-->
                <!--                    <p class="text-center font-weight-bold" style="font-size: 18px;">0</p>-->
                <!--                    <span style="font-size: 14px;">upvotes</span>-->
                <!--                </div>-->
                <!--                <div class="text-center text-secondary">-->
                <!--                    <p class="text-center font-weight-bold" style="font-size: 18px;">0</p>-->
                <!--                    <span style="font-size: 14px;">comments</span>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="card w100-mobile-xs" style="width: 15%;">-->
                <!--        <div class="card-header bg-white">-->
                <!--            <div class="d-flex" style="justify-content: space-between; align-items: center;">-->
                <!--                <span class="text-secondary">-->
                <!--                    <svg width="20px" style="color: rgb(221, 75, 57)" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
                <!--                        <path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>-->
                <!--                    </svg>-->
                <!--                    <span class="ml-1">IMPACT</span></span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="card-body">-->
                <!--            <div class="text-center text-secondary">-->
                <!--                <p class="text-center font-weight-bold" style="font-size: 18px;">0</p>-->
                <!--                <span style="font-size: 14px;">students helped</span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!-- OLD PROFILE PAGE CODE END -->
            </div>
        </div>
    </div>
</section>

<section class="py-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                <div class="success-sec">
                    <div class="reward-title">1x</div>
                    <h4 class="mb-3">Get double Premium Access on your next upload!</h4>
                    <a href="<?= SITE_URL; ?>" class="btn px-3 py-2 btn-green white-text shadow-none w-100">
                        My Dashboard
                    </a>
                    <p class="mt-1">For every document you upload now, you'll receive <?= $data['points']['option_value'] ?> points</p>
                </div>
            </div>
        </div>
    </div>
</section>