<?php is($data) and is($data['category']) and is($data['faq']) or show_404(); ?>
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo SITE_URL; ?>"><?php echo SITE_NAME ?></a>
                <span>></span><a href="<?php echo SITE_URL; ?>faqs">FAQ</a>
                <span>></span><a href="<?php echo SITE_URL; ?>faq/<?php is($data['category']->slug, 'show') ?>/<?php is($data['category']->id, 'show') ?>">
                    <?php is($data['category']) and is($data['category']->title, 'showCapital'); ?>
                </a>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <form action="<?php echo SITE_URL; ?>faqSearch" method="post" id="faqSearch">
                    <div class="bg-white d-flex px-3 border" style="justify-content: center; align-items: center; border-radius: 25px">
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
            <div class="col-md-3">
                <h6 class="font-weight-bold">Articles in this section </h6>
                <ul class="list-group">
                    <?php if (is($data['faqs'], 'array')) foreach ($data['faqs'] as $cat) : ?>
                        <li class="list-group-item">
                            <a href="<?php echo SITE_URL; ?>faq/<?php is($cat->slug, 'show') ?>" class="py-3 text-dark">
                                <?php is($cat->title, 'showCapital'); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-8">
                <h2 class="mb-4">
                    <?php is($data['faq']->title, 'showCapital') ?>
                </h2>
                <p><?php is($data['faq']->description, 'show') ?></p>
                <hr class="my-5">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">
                            Recently viewed articles
                        </h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">
                            Related articles
                        </h6>
                        <ul class="list-group">
                            <?php if (is($data['faqs'], 'array')) foreach ($data['faqs'] as $cat) : ?>
                                <li class="list-group-item border-0">
                                    <a href="<?php echo SITE_URL; ?>faq/<?php is($cat->slug, 'show') ?>" class="py-3">
                                        <?php is($cat->title, 'showCapital'); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>