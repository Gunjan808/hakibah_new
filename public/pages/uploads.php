<!-- Breadcrumb Section -->
<?php
// echo '<pre>';
// print_r($_SERVER);
// die;
?>
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
<section class="py-1 bg-light">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12 d-inline-flex d-flex-custom d-flex-custom-profile">
                <div class="">
                    <div class="rounded-circle bg-warning p-1 text-center mr-3 d-flex" style="width: 100px; height:100px;align-items: center; justify-content: center;">
                        <span class="text-white h1">
                            <?php is($_SESSION['USER_NAME']) and print(substr($_SESSION['USER_NAME'], 0, 1)) ?>
                        </span>
                    </div>
                </div>
                <div class="ml-5">
                    <h2 class="font-weight-bold text-secondary">
                        <?php is($_SESSION['USER_FULLNAME'], 'show') ?>
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
                                <?php is($data['total']->total_upload) and print ($data['total']->total_upload * 50) or print('0'); ?>
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

<section class="py-2 my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (is($data['upload_docs'], 'array')) : ?>
                    <h4 class="text-secondary mb-3">
                        Uploads
                    </h4>
                    <?php foreach ($data['upload_docs'] as $doc) : ?>
                        <div class="card mr-3 ml-auto w-25 w100-mobile-xs d-block d-sm-none">
                            <div class="card-header bg-white">
                                <div class="d-flex" style="justify-content: space-between; align-items: center;">
                                    <span class="text-secondary">NAME</span>
                                    <span class="text-secondary">RATINGS</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex text-" style="justify-content: space-between; align-items: center;">
                                    <span style="font-size: 16px;">
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
                                        <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>"><?php is($doc->title, 'showCapital'); ?></a>
                                    </span>
                                    <span class="text-secondary font-weight-bold">

                                    </span>
                                    <span class="text-secondary">
                                        <svg width="16px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                        </svg>
                                        <span class="ml-1">None</span>
                                    </span>
                                </div>
                                <div class="pt-2">
                                    <?php is($doc->views, 'show') or print('0'); ?> Views
                                </div>
                                <div class="pt-2">
                                    <button class="btn btn-sm btn-light border" data-toggle="modal" data-target="#exampleModal">
                                        Free share
                                    </button>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                        <div class="card d-none d-sm-block">
                            <div class="card-header bg-white">
                                <div class="row">
                                    <div class="col-3">
                                        <span class="text-secondary">NAME</span>
                                    </div>
                                    <div class="col-2">
                                        <span class="text-secondary">VIEWS</span>
                                    </div>
                                    <div class="col-2">
                                        <span class="text-secondary">RATINGS</span>
                                    </div>
                                    <div class="col-2">
                                        <span class="text-secondary">Anonymous</span>
                                    </div>
                                    <div class="col-3">
                                        <span class="text-secondary">SHARE</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="list-group list-group-flush">
                                    <?php foreach ($data['upload_docs'] as $doc) : ?>
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-3">
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
                                                <div class="col-2">
                                                    <span class="text-secondary font-weight-bold">
                                                        <?php is($doc->views, 'show') or print('0'); ?>
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="text-secondary">
                                                        <svg width="16px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                        </svg>
                                                        <span class="ml-1">None</span>
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="save<?php is($doc->id, 'show') ?>" name="title" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="save<?php is($doc->id, 'show') ?>">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-sm btn-light border" data-toggle="modal" data-target="#exampleModal">
                                                        Free share
                                                    </button>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Share Document</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Use the link below to share this document with your friends and they will have full access to your document without requiring an account.</p>
                <div class="row">
                    <div class="col-6">
                        <input type="text" value="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>" id="myInput" class="form-control">
                    </div>
                    <div class="col-4">
                        <button onclick="myFunction()" class="btn btn-success">Copy text</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        //alert("Copied the text: " + copyText.value);
    }
</script>