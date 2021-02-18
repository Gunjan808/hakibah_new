<?php is($data['university'], 'object') ? $university = $data['university'] : show_404() ?>
<?php is($university) or show_404() ?>
<style>
    .searchBar{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    @media only screen and (max-width: 992px){
        .searchBar{
            width: 390px;
        }
    }
    @media only screen and (max-width: 768px){
        .searchBar{
            width: 290px;
        }
    }
    @media only screen and (max-width: 576px){
        .searchBar{
            width: 160px;
        }
    }
    @media only screen and (max-width: 450px){
        .searchBar{
            width: 170px;
        }
    }
    @media only screen and (max-width: 350px){
        .searchBar{
            width: 125px;
        }
    }
    
</style>
<!-- Search Section -->
<section>
    <div style="background:url(<?php echo SITE_URL; ?>assets/img/002.jpg) top;  background-size: cover; text-align:center">
        <div style="height: 70vh; display:grid; place-items: center">
            <div class="text-center text-white">
                <div class="px-3 mb-5">
                    <h1 class="font-weight-bold">
                        <?php is($university->title, 'showCapital'); ?>
                    </h1>
                    <p>
                        The best documents shared by your fellow students, organized in one place.
                    </p>
                </div>

                <div class="d-inline-flex bg-white align-items-center rounded shadow-sm mt-1 py-1" style="width: 60vw;">
                    <div class="p-sm-3 p-2 text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <div class="form-group mb-0 w-100">
                        <!-- <input type="text" name="search" id="search" class="form-control border-0 rounded-0 shadow-none" placeholder="Search for a course in this university and find study material about it"> -->
                        <span contenteditable='true' class="searchBar text-left form-control border-0 rounded-0 shadow-none" id="searchCourse" data-university="<?php is($university->id, 'show') ?>" data-slug="<?php is($university->slug, 'show') ?>">
                            Search for a course in this university and find study material about it
                        </span>
                    </div>
                    <!-- <div class="py-1 px-3">
                        <button class="btn btn-primary">
                            Search
                        </button>
                    </div> -->
                </div>
                <ul class="list-group text-left position-absolute mx-auto" id="showCourse" style="display:none; left: 0; right: 0; z-index: 999999; width: 60vw"></ul>
            </div>
        </div>


        <div class="pb-4 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>
</section>

<?php if (is($data['cats'], 'array')) : ?>
    <!-- Total Counts Section -->
    <section class="border-bottom">
        <div class="container">
            <div class="row align-items-center py-3">
                <?php foreach ($data['cats'] as $cat) : ?>
                    <div class="col-sm col-6 mb-sm-0 mb-3">
                        <h5 class="text-primary font-weight-bold">
                            <?php is($cat->total, 'show'); ?>
                        </h5>
                        <p class="mb-0 text-secondary">
                            Total <?php is($cat->title, 'showCapital'); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Breadcrumb Section -->
<section class="py-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col d-inline-flex">
                <a href="<?php echo SITE_URL; ?>institution">
                    <h6>University</h6>
                </a>&nbsp; > &nbsp;<a href="<?php echo SITE_URL; ?>institution/<?php is($university->slug, 'show'); ?>">
                    <h6>
                        <?php is($university->title, 'showCapital'); ?>
                    </h6>
                </a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container my-3">
        <div class="row">
            <?php if (is($data['courses'], 'array')) : ?>
                <div class="col-sm-6 col-12">
                    <div class="border-bottom pb-2">
                        <h4>Most Popular Courses</h4>
                    </div>
                    <ul class="list-unstyled">
                        <?php foreach ($data['courses'] as $course) : ?>
                            <li class="border-bottom myHover">
                                <a class="d-flex" style="flex-direction: row;" href="<?php echo SITE_URL; ?>course/<?php is($university->slug, 'show') ?>/<?php is($course->slug, 'show') ?>">
                                    <svg class="ic ic-course ic-course--small" width="25" height="24" viewBox="0 0 16 12">
                                        <g fill="none" fill-rule="evenodd">
                                            <path fill=" #91bbd7" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                            <rect width="16" height="11" y="1" fill=" #91bbd7" rx="2"></rect>
                                            <rect width="16" height="10" y="2" fill="#569eba" rx="1"></rect>
                                            <rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
                                            <rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
                                        </g>
                                    </svg>
                                    <span class="mt-0 mb-1 ml-3">
                                        <?php is($course->title, 'showCapital'); ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (is($data['documents'], 'array')) : ?>
                <div class="col-sm-6 col-12">
                    <div class="border-bottom pb-2">
                        <h4>Most Popular Documents</h4>
                    </div>
                    <ul class="list-unstyled">
                        <?php foreach ($data['documents'] as $document) : ?>
                            <li class="border-bottom myHover">
                                <a href="<?php echo SITE_URL; ?>document/<?php is($document->slug, 'show') ?>/<?php is($document->id, 'show') ?>" class="text-primary d-flex align-items-center ">
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

                                    <span class="ml-3">
                                        <?php is($document->title, 'showCapital'); ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (is($data['recent_docs'], 'array')) : ?>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Recent documents</h4>
                </div>
                <?php foreach ($data['recent_docs'] as $doc) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card shadow">
                            <div class="card-body p-0 rounded-lg">
                                <div class="pt-4 px-3 text-center" style="background: #aaa; height: 160px; overflow: hidden;">
                                    <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                        <img class="img-fluid rounded-lg" src="<?php is($doc->image, 'show') ?>" alt="<?php is($doc->title, 'show'); ?>">
                                    </a>
                                </div>
                                <div class="d-inline-flex align-items-center px-3 py-3">
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
                                    <a class="text-dark" href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                        <h6 class="mb-0 ml-3">
                                            <?php is($doc->title, 'showCapital'); ?>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section>
    <div class="container my-5 py-4 border-bottom">
        <div class="row">
            <div class="col-md-12">
                <h4>All courses</h4>
            </div>
            <div class="col-md-12 mt-3">
                <?php $letters = range('A', 'Z');
                foreach ($letters as $letter) : ?>
                    <button class="btn btn-outline-primary shadow-sm px-3 py-2 mr-2 mb-2" style="border-color: #e6e9ec">
                        <?php echo $letter ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>