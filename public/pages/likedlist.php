<?php //is($data['abc'], 'object') ? $abc = $data['abc'] : show_404() 
?>
<?php
//print_r($_SESSION);
// echo '<pre>';
// print_r($data);
//die;

//is($abc) or show_404() 
?>
<style>
    .widthMObile-img{width: 15%;}
    @media (max-width: 767px){
        .flex-Mobile-xs{flex-direction: row;}
        .widthMObile-img{width: 150px;}
        .fontMobile-heading{font-size: 1.5rem;}
        .nav-pills .mr-5{margin-right: 20px !important;}
        .nav-pills .nav-links h5{font-size: 16px;}
    }
</style>
<!-- Breadcrumb Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-inline-flex">
                <svg class="ic ic-studylist" width="56" height="42" viewBox="0 0 56 42">
                    <g fill="none" fill-rule="evenodd">
                        <path fill="#D35D3D" fill-rule="nonzero" d="M6.69445239,8.70830503 C7.15899767,8.23610168 7.853442,8 8.77778539,8 L53.2222227,8 C54.1481484,8 54.8425928,8.23610168 55.3055557,8.70830503 C55.7685186,9.18050838 56,9.8888134 56,10.8332201 L53.7777781,36.3322011 C53.5389935,38.1908463 52.8940743,39.6074564 51.8430204,40.5820312 C50.7919665,41.5566061 49.399849,42.0288094 47.666668,41.9986413 L29.6755434,41.9986413 L6.00000806,27.8325407 L6.00000806,10.8332201 C5.99842567,9.8888134 6.22990711,9.18050838 6.69445239,8.70830503 Z"></path>
                        <path fill="#15689E" fill-rule="nonzero" d="M17.7083335,0.692307692 C18.1808043,0.230769231 18.8891376,0 19.8333335,0 L48.1666667,0 C49.1111111,3.44519285e-13 49.8194445,0.230769231 50.2916667,0.692307692 C50.7638889,1.15384615 51,1.84615385 51,2.76923077 L51,36 L17,36 L17.0000002,2.76923077 C16.9997517,1.84615385 17.2358628,1.15384615 17.7083335,0.692307692 Z"></path>
                        <path fill="#0088D7" fill-rule="nonzero" d="M11.7086594,5.71428571 C12.1811255,5.23809524 12.8894519,5 13.8336386,5 L42.1666944,5 C43.1111296,5 43.819456,5.23809524 44.2916736,5.71428571 C44.7638912,6.19047619 45,6.9047619 45,7.85714286 L45,25 L11,25 L11.000333,7.85714286 C11.0000845,6.9047619 11.2361933,6.19047619 11.7086594,5.71428571 Z"></path>
                        <path fill="#FFF" fill-rule="nonzero" d="M16.4166667 10L30.5833333 10C31.5277778 10 32 10.5 32 11.5 32 12.5 31.5277778 13 30.5833333 13L16.4166667 13C15.4722222 13 15 12.5 15 11.5 15 10.5 15.4722222 10 16.4166667 10zM17.8333333 15L36.1666667 15C37.3888889 15 38 15.5 38 16.5 38 17.5 37.3888889 18 36.1666667 18L17.8333333 18C16.6111111 18 16 17.5 16 16.5 16 15.5 16.6111111 15 17.8333333 15z" opacity=".503"></path>
                        <path fill="#FF9676" fill-rule="nonzero" d="M2.78947368,39.2012641 C2.8860567,39.9344427 3.18459415,40.5465209 3.68508604,41.0374987 C4.18557793,41.5284765 4.81686504,41.8464241 5.57894737,41.9913414 L50.2105263,42 C51.1403509,41.95104 51.8377193,41.6245208 52.3026316,41.0204424 C52.7675439,40.416364 53,39.8099713 53,39.2012641 L50.2105263,22.4116887 C49.9288071,21.4634563 49.6033685,20.8094712 49.2342105,20.4497333 C48.6804735,19.9101266 48.0588123,19.6101126 47.4210526,19.6101126 C47.0063762,19.6101126 38.1513343,19.6101126 20.8559272,19.6101126 C20.4181314,19.6101126 19.918245,19.4079883 19.6657895,19.2034954 C19.4133339,18.9990025 19.2768112,18.7250678 19.1542985,18.3243252 C18.2729609,15.4414417 17.7370959,14 16.7421016,14 C16.0787721,14 11.4278962,14 2.78947368,14 C1.85838876,14.0084565 1.16144992,14.2458981 0.698657152,14.7123247 C0.235864387,15.1787513 0.0029786696,15.8784353 0,16.8113766 L2.78947368,39.2012641 Z"></path>
                        <path fill="#FFF" d="M33.3525987,29.8620324 L20.1564635,36.6859032 C19.8484212,36.8430926 19.6,36.7043961 19.6,36.3807708 L19.6,22.770015 C19.6,22.4463897 19.8484212,22.3076931 20.1564635,22.4648826 L33.3525987,29.2887533 C33.660641,29.4459428 33.660641,29.704843 33.3525987,29.8620324 Z" transform="rotate(-7 26.592 29.575)"></path>
                    </g>
                </svg>
                <div class="ml-3">
                    <h1 class="font-weight-bold text-secondary mb-1 fontMobile-heading">
                        <?php echo 'Liked Documents' ?>
                    </h1>

                </div>
            </div>

            <div class="col-6 d-inline-flex text-secondary">
                <a class="d-inline-flex text-decoration-none" style="align-items: center;" href="<?php echo SITE_URL; ?>user/profile/<?php is($_SESSION['USER_UNIVERSITY_ID'], 'show'); ?>/<?php is($_SESSION['USER_ID'], 'show'); ?>">
                    <span class="text-secondary">by &nbsp; </span>
                    <h6 class="mb-0">
                        <?php echo $_SESSION['USER_FULLNAME'] ?>
                    </h6>
                </a>
            </div>
            <div class="col-md-12 my-2">
                <!--<a href="<?php echo SITE_URL; ?>upload  " class="btn px-3 py-2 btn-primary">-->
                <!--    <svg aria-hidden="true" focusable="false" width="20" data-prefix="fas" data-icon="cloud-upload-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">-->
                <!--        <path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"></path>-->
                <!--    </svg>-->
                <!--    Upload to Studylist-->
                <!--</a>-->
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3 border-bottom pb-3" id="pills-tab" role="tablist">
                    <li class="nav-item mr-5" role="presentation">
                        <a class="nav-links lead text-decoration-none text-secondary active" id="pills-documents-tab" data-toggle="pill" href="#pills-documents" role="tab" aria-controls="pills-documents" aria-selected="true">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">
                                        Documents(<?php is($data['abc']) and print (count($data['abc'])) or print('0') ?>)
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- <li class="nav-item mr-5 " role="presentation">
                        <a class="nav-links lead text-decoration-none text-secondary" id="pills-students-tab" data-toggle="pill" href="#pills-students" role="tab" aria-controls="pills-students" aria-selected="false">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">Students(0)</h5>
                                </div>
                            </div>
                        </a>
                    </li> -->
                </ul>
                <form>
                   
					
					
					
					
					
					<div class="d-inline-flex bg-white align-items-center rounded shadow-sm mt-1 py-1 border position-relative" style="width: 100%;" id="myPanelSearch">
                                <!--    <div class="p-3 text-dark">-->
                                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">-->
                                <!--            <circle cx="11" cy="11" r="8"></circle>-->
                                <!--            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>-->
                                <!--        </svg>-->
                                <!--    </div>-->
                                <!--    <div class="form-group mb-0 w-100">-->
                                <!--        <input type="text" name="query" id="search" class="form-control border-0 rounded-0 shadow-none" placeholder="search within the liked list">-->
                                <!--    </div>-->
                                <!--    <div class="py-1 px-3">-->
                                <!--        <button type="submit" class="btn btn-success"><a class="fa fa-search" style="color:#EEEEEE">search</a></button>-->
                                <!--    </div>-->
                                <!--</div>-->
					
					
					
					
					
					

                </form>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-documents" role="tabpanel" aria-labelledby="pills-documents-tab">
                        <div class="row">
                            <?php if (is($data)) : ?>

                                <?php foreach ($data['abc'] as $key => $doc) : ?>

                                    <div class="col-md-12 pt-3 border-bottom">
                                        <h5 class="font-weight-bold mb-3">
                                            <?php is($doc['doc']['title'], 'showCapital'); ?>
                                        </h5>
                                        <div class="d-inline-flex">
                                            <h6>Date <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>


                                        </svg></h6>
                                            <h6 class="ml-4">Rating <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>


                                        </svg></h6>
                                            <h6 style="margin-left:800px;">Year <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>


                                        </svg></h6>
                                        </div>
                                    </div>


                                    <div class="col-md-12 py-3 border-bottom mb-3">
                                        <div class="d-flex flex-Mobile-xs">
                                            <div class="mr-1 pt-1 px-1 widthMObile-img" style="background:#aaa; height: 100px; overflow:hidden;">
                                                <?php

                                                // echo '<pre>';
                                                // print_r($doc);
                                                // die;

                                                ?>
                                                <img class="w-100" src="<?php is($doc['doc']['image'], 'show') ?>" alt="<?php is($doc['doc']['title'], 'showCapital'); ?>">
                                            </div>
                                            <div style="flex-grow: 1;">
                                                <div class="">
                                                    <a href="<?php echo SITE_URL; ?>document/<?php is($doc['doc']['slug'], 'show'); ?>/<?php is($doc['doc']['id'], 'show'); ?>" class="text-primary d-block">
                                                        <?php is($doc['doc']['title'], 'showCapital'); ?>
                                                    </a>
                                                    <small><?php is($doc['doc']['doc_pages'], 'show') ?> pages</small>
                                                </div>
                                            </div>
                                            <div class="mr-5 year">
                                                <?php is($doc['doc']['academic_year'], 'show'); ?>
                                            </div>
                                            <div class="">
                                                <div class="text-success d-inline mr-2">
                                                    <svg width="20" height="20" style="margin-bottom: 7px;" class="svg-inline--fa fa-thumbs-up fa-w-16 thumb--neBaI" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                    </svg>
                                                </div> 100%
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-students" role="tabpanel" aria-labelledby="pills-students-tab">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>