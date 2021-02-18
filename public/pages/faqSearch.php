<?php is($data) or show_404(); ?>
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo SITE_URL; ?>"><?php echo SITE_NAME ?></a>
                <span>> Search Results</span>
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
                            <input type="text" name="search" class="border-0 form-control shadow-none" placeholder="Search" value="<?php is($data['search'], 'show'); ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-4">
        <?php if (is($data['faqs'], 'array')) : ?>
            <div class="row">
                <div class="col-md-3">
                    <h6 class="font-weight-bold">By Category</h6>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="py-3 text-dark">All Categories
                                (<?php is($data['faqs']) and print(count($data['faqs'])); ?>)
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <h6 class="font-weight-bold">
                        <?php is($data['faqs']) and print(count($data['faqs'])); ?>
                        results for "<?php is($data['search'], 'show'); ?>" in All Categories
                    </h6>
                    <hr class="mb-2">
                    <ul class="list-group">
                        <?php if (is($data['faqs'], 'array')) foreach ($data['faqs'] as $faq) : ?>
                            <li class="list-group-item border-0 mb-3">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mt-0 mb-1">
                                                    <a href="<?php echo SITE_URL; ?>faq/<?php is($faq->slug, 'show') ?>" class="py-3">
                                                        <?php is($faq->title, 'showCapital'); ?>
                                                    </a>
                                                </h6>
                                                <small>
                                                    <a href="<?php echo SITE_URL; ?>" class="text-dark"><?php echo SITE_NAME ?></a><span>></span><a href="<?php echo SITE_URL; ?>faqs" class="text-dark">FAQ</a>
                                                    <span>></span><a href="<?php echo SITE_URL; ?>faq/<?php is($faq->category_slug, 'show') ?>/<?php is($faq->category_id, 'show') ?>" class="text-dark">
                                                        <?php is($faq->category_title, 'showCapital'); ?>
                                                    </a>
                                                </small>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <small><?php is($faq->created_date, 'date'); ?></small>
                                            </div>
                                        </div>

                                        <p>
                                            <?php is($faq->description) and print(substr($faq->description, 0, 98)) ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-8" style="height: 40vh;">
                    <h5 class="font-weight-bold">No results for "<?php is($data['search'], 'show') ?>"</h5>
                    <p>Try searching another keyword.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>