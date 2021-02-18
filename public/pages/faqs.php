<style>
    .bannerCover-padding3rem{padding: 3rem;}
    .btn-outline-primary:hover {
        color: #fff !important;
    }    
    @media (max-width: 767px){
        .bannerCover-padding3rem{padding: 3rem 0;}
    }
</style>

<section class="bannerCover-padding3rem" style="background: url(<?php echo SITE_URL; ?>assets/img/bgBlue.png) center; background-size: cover">
    <div class="container my-5">
        <div class="row py-5">
            <div class="col-md-2"></div>
            <div class="col-12 col-md-8" style="padding-left: 6%; padding-right: 6%; ">
                <form action="<?php echo SITE_URL; ?>faqSearch" method="post" id="faqSearch">
                    <div class="bg-white d-flex px-3" style="justify-content: center; align-items: center; border-radius: 25px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" focusable="false" viewBox="0 0 12 12" class="search-icon" aria-hidden="true">
                            <circle cx="4.5" cy="4.5" r="4" fill="none" stroke="currentColor"></circle>
                            <path stroke="currentColor" stroke-linecap="round" d="M11 11L7.5 7.5"></path>
                        </svg>
                        <div class="form-group bg-white mb-0 w-100">
                            <input type="text" name="search" class="border-0 form-control shadow-none" placeholder="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-4">
        <div class="row">
            <?php if (is($data['cats'], 'array')) foreach ($data['cats'] as $cat) : ?>
                <div class="col-md-4 my-3">
                    <a href="<?php echo SITE_URL; ?>faq/<?php is($cat->slug, 'show') ?>/<?php is($cat->id, 'show') ?>" class="py-3 btn btn-lg btn-outline-primary btn-block shadow-none">
                        <?php is($cat->title, 'showCapital'); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>