<!-- Breadcrumb Section -->
<section class="py-1">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="font-weight-bold text-secondary">My notifications</h1>
            </div>
            <div class="col-md-12">
                <?php if (is($notifications, 'array')) : ?>
                    <ul class="list-group">
                        <?php foreach ($notifications as $notification) : ?>
                            <li class="list-group-item py-3">
                                <div class="d-flex" style="align-items: center;">
                                    <span class="text-secondary mr-5">
                                        <?php is($notification->created_date, 'timeago'); ?>
                                    </span>
                                    <div class="rounded-lg text-center pt-2 mx-3" style="background: #e0f4e8; color: #5bc787; width: 40px; height: 40px">
                                        <svg width="18" height="18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                        </svg>
                                    </div>
                                    <a class="text-dark text-decoration-none" href="<?php echo SITE_URL; ?>document/<?php is($notification->slug, 'show'); ?>/<?php is($notification->id, 'show'); ?>">
                                        Uploaded document
                                        <span class="text-primary">
                                            <?php is($notification->title, 'showCapital'); ?>
                                        </span> approved!
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <div class="alert alert-warning">
                        <span>You are up to date!</span><br>
                        <span>No notifications</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>