<?php is($document, 'json') or show_404(); ?>
<?php
// echo '<pre>';
// print_r($_SERVER);
// die();
?>
<div class="container-fluid">
    <div class="row flex-row-reverse">
        <div class="bg-light col-md-9 px-0" id="sidebarWrapper" style="height: 90vh; overflow-y:auto">
            <div class=" text-right py-3 px-3 position-fixed" id="docHeader" style="z-index: 999; width: 75vw; height:50px">
                <div class="float-left d-inline-flex">
                    <a href="<?php echo SITE_URL; ?>">
                        <h6>Home</h6>
                    </a>&nbsp; > &nbsp;<a href="<?php echo SITE_URL; ?>document/<?php is($document->slug, 'show'); ?>/<?php is($document->id, 'show'); ?>">
                        <h6>
                            <?php is($document->university_title, 'showCapital'); ?>
                        </h6>
                    </a>
                </div>
				&nbsp; &nbsp; 
                <button class="btn btn-sm float-right btn btn-success"><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" style="color:#FFFFFF">Back</a></button>
				
				&nbsp; &nbsp; 
                <a class="btn btn-sm btn-light border border-secondary ml-3 px-3" href="<?php is_user_login() and print ('#saveModel" data-toggle="modal" data-target="#saveModal') or print(SITE_URL . 'login'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="<?php is($saved, 'json') and print ('rgb(91, 199, 135)') or print('none') ?>" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark mr-1">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <?php is($saved, 'json') and print ('Saved') or print('Save') ?>
                </a>
            </div>
			<style>
			.toolbar--2nKWJ .control--1AxZH {
    display: inline-block;
    margin: 0 5px;
    min-width: 30px;
    height: 30px;
    color: #fff;
	
}
			
			</style>
            <div class="pt-5 px-5">
                <div class="pt-3 px-3 position-relative text-center">
                    <style>
                        embed,
                        iframe {
                            width: 100%;
                            height: 100vh;
                            border-radius: 25px;
                            box-shadow: 0 0 32px #00000080;
                        }
                    </style>
                    <?php strpos($document->file, '.') !== false and $array = explode('.', SITE_URL . $document->file);
                    is($array, 'array') and $fileType = end($array); ?>

                    <?php if (is($fileType) && (strtoupper($fileType) === 'PDF')) : ?>
                        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
						
						
						
                        <div class="position-fixed bg-dark text-white p-3" style="border-radius: 7px ;  z-index: 99999; bottom: 3%; transform: translate(-65%, 7%); color:#FFFF00; left: 65%; right: -5%">
                            <div class="row" >
                                <div class="col">
                                  
									<span id="prev">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" class="svg-inline--fa fa-arrow-up fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="24"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>
									</span>
                                </div>
                                <div class="col">
                                
									<span id="next">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-down" class="svg-inline--fa fa-arrow-down fa-w-14 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="24"><path fill="currentColor" d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"></path></svg>
									</span>
									
									
                                </div>
                                <div class="col">
                                    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                                </div>
                                <div class="col">
								
                                   
									
									
							<span id="zoominbutton"   style="width:40px; color:#FFFFFF">	
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search-plus" class="svg-inline--fa fa-search-plus fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  width="24" height="24"><path fill="currentColor" d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path></svg>
													</span>
									
									
									
                                </div>
                                <div class="col">
								
							
								
								
                                    <span id="zoomoutbutton" style="width:40px; color:#ffffff" >
									
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search-minus" class="svg-inline--fa fa-search-minus fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24"><path fill="currentColor" d="M304 192v32c0 6.6-5.4 12-12 12H124c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path></svg>
									
									</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <canvas id="the-canvas" class="rounded-lg border"></canvas>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <embed src="<?php echo SITE_URL; ?><?php is($document->file, 'show'); ?>#toolbar=0&navpanes=0&scrollbar=0" />
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 border-right" id="sidebarCtn">
            <div class="row px-3" style="height: 90vh; overflow-y:auto">
                <div class="col-md-12 border-bottom p-3 text-right text-secondary">
                    <div id="hideDocSidebar">
                        <svg width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M223.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L319.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L393.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34zm-192 34l136 136c9.4 9.4 24.6 9.4 33.9 0l22.6-22.6c9.4-9.4 9.4-24.6 0-33.9L127.9 256l96.4-96.4c9.4-9.4 9.4-24.6 0-33.9L201.7 103c-9.4-9.4-24.6-9.4-33.9 0l-136 136c-9.5 9.4-9.5 24.6-.1 34z"></path>
                        </svg>
                    </div>
                </div>
                <div class="col-md-12" id="sidebarDocs">
                    <div class="border-bottom pt-3 pb-2 px-1">
                        <h4><?php is($document->title, 'showCapital'); ?></h4>
                        <h6 class="text-secondary">
                            <?php is($document->description, 'show'); ?>
                        </h6>
                    </div>
                    <div class="border-bottom py-2 px-1">
                        <small class="text-secondary d-block">
                            University
                        </small>
                        <a href="<?php echo SITE_URL; ?>institution/<?php is($document->university_slug, 'show'); ?>">
                            <?php is($document->university_title, 'showCapital'); ?>
                        </a>
                    </div>
                    <div class="border-bottom py-2 px-1">
                        <small class="text-secondary d-block">
                            Course
                        </small>
                        <a href="<?php echo SITE_URL; ?>course/<?php is($document->university_slug, 'show') ?>/<?php is($document->course_slug, 'show') ?>">
                            <?php is($document->course_title, 'showCapital'); ?>
                        </a>
                    </div>
                    <div class="border-bottom py-2 px-1 d-flex">
                        <div class="mr-3">
                            <small class="text-secondary d-block">
                                uploaded by
                            </small>
                            <a href="<?php echo SITE_URL; ?>user/profile/<?php is($document->university_id, 'show') ?>/<?php is($document->user_id, 'show') ?>">
                                <?php is($document->first_name, 'showCapital'); ?>
                                <?php is($document->last_name, 'showCapital'); ?>
                            </a>
                        </div>

                        <a href="<?php echo SITE_URL; ?><?php is($document->followed, 'json') and print ('unfollow') or print('follow'); ?>/<?php is($document->created_by, 'show'); ?>" class="mt-2 btn btn-sm btn-<?php is($document->followed, 'json') and print ('success') or print('outline-success'); ?> rounded-circle text-center" style="width: 35px; height: 35px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </a>
                    </div>
                    <div class="border-bottom py-2 px-1">
                        <small class="text-secondary d-block">
                            Academic Year
                        </small>
                        <span>
                            <?php is($document->academic_year, 'show') ?>
                        </span>
                    </div>
                    <div class="border-bottom py-3 px-1">
                        <div class="row">
                            <div class="col-md-2 pt-2">
                                <span class="text-secondary">Helpful</span>
                            </div>
                            <?php $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REDIRECT_URL'];  ?>
                            <div class="col-md-5 pl-4 pr-2">
                                <a class="border btn-block text-center py-1" href="<?php is_user_login() and print (SITE_URL . 'helpful/' . $document->id . '/1" data-toggle="modal" data-target="#likeModal') or print(SITE_URL . 'login/?' . $redirect_url); ?>">
                                    <div class="text-success d-inline">
                                        <svg width="13" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-1">
                                        <?php is($document->helpful, 'show') or print('0'); ?>
                                    </span>
                                </a>
                            </div>
                            <div class="col-md-5 pl-2">
                                <a href="<?php is_user_login() and print (SITE_URL . 'helpful/' . $document->id . '/0".') or print(SITE_URL . 'login/?' . $redirect_url); ?>" class="border btn-block text-center py-1">
                                    <div class="text-danger d-inline">
                                        <svg width="13" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M466.27 225.31c4.674-22.647.864-44.538-8.99-62.99 2.958-23.868-4.021-48.565-17.34-66.99C438.986 39.423 404.117 0 327 0c-7 0-15 .01-22.22.01C201.195.01 168.997 40 128 40h-10.845c-5.64-4.975-13.042-8-21.155-8H32C14.327 32 0 46.327 0 64v240c0 17.673 14.327 32 32 32h64c11.842 0 22.175-6.438 27.708-16h7.052c19.146 16.953 46.013 60.653 68.76 83.4 13.667 13.667 10.153 108.6 71.76 108.6 57.58 0 95.27-31.936 95.27-104.73 0-18.41-3.93-33.73-8.85-46.54h36.48c48.602 0 85.82-41.565 85.82-85.58 0-19.15-4.96-34.99-13.73-49.84zM64 296c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm330.18 16.73H290.19c0 37.82 28.36 55.37 28.36 94.54 0 23.75 0 56.73-47.27 56.73-18.91-18.91-9.46-66.18-37.82-94.54C206.9 342.89 167.28 272 138.92 272H128V85.83c53.611 0 100.001-37.82 171.64-37.82h37.82c35.512 0 60.82 17.12 53.12 65.9 15.2 8.16 26.5 36.44 13.94 57.57 21.581 20.384 18.699 51.065 5.21 65.62 9.45 0 22.36 18.91 22.27 37.81-.09 18.91-16.71 37.82-37.82 37.82z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-1">
                                        <?php is($document->not_helpful, 'show') or print('0'); ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom py-3 px-1">
                        <?php if (is_user_login()) : ?>
                            <a href="#reportModel" class="d-flex" data-toggle="modal" data-target="#reportModal">
                            <?php else : ?>
                                <a href="<?php echo SITE_URL; ?>login" class="d-flex">
                                <?php endif; ?>
                                <span class="text-secondary">
                                    <svg width="20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M349.565 98.783C295.978 98.783 251.721 64 184.348 64c-24.955 0-47.309 4.384-68.045 12.013a55.947 55.947 0 0 0 3.586-23.562C118.117 24.015 94.806 1.206 66.338.048 34.345-1.254 8 24.296 8 56c0 19.026 9.497 35.825 24 45.945V488c0 13.255 10.745 24 24 24h16c13.255 0 24-10.745 24-24v-94.4c28.311-12.064 63.582-22.122 114.435-22.122 53.588 0 97.844 34.783 165.217 34.783 48.169 0 86.667-16.294 122.505-40.858C506.84 359.452 512 349.571 512 339.045v-243.1c0-23.393-24.269-38.87-45.485-29.016-34.338 15.948-76.454 31.854-116.95 31.854z"></path>
                                    </svg>
                                </span>
                                <span class="ml-3">Report Document</span>
                                </a>
                    </div>
                    <div class="border-bottom py-3 px-1">
                        <button class="btn btn-outline-secondary btn-block bg-white text-secondary" data-toggle="modal" data-target="#myModal">
                            Share
                        </button>
                        <p class="my-3">Comments</p>
                        <?php if (true) : ?>
                            <form action="" method="post">
                                <div class="form-group text-right">
                                    <input type="hidden" name="study_doc_id" value="<?php is($document->id, 'show') ?>">
                                    <textarea name="comment" id="" rows="3" class="form-input w-100 px-2 py-1" placeholder="Comment or ask a question..."></textarea>
                                    <button class="btn btn-light border" name="postComment" value="<?php echo $redirect_url; ?>">Post</button>
                                </div>
                            </form>

                            <ul class="list-group">
                                <?php if (is($comments, 'array')) foreach ($comments as $comment) : ?>
                                    <li class="list-group-item">
                                        <div class="d-flex">
                                            <div class="mr-3">
                                                <img class="rounded-circle" src="<?php echo SITE_URL; ?><?php is($comment->profile_pic, 'show') ?>" width="40" height="40" alt="">
                                            </div>
                                            <div class="">
                                                <div class="d-block">
                                                    <a href="#">
                                                        <?php is($comment->first_name, 'showCapital'); ?>
                                                        <?php is($comment->last_name, 'showCapital'); ?>
                                                    </a>
                                                    <span class="text-secondary">.</span>
                                                    <span class="text-secondary">
                                                        <?php is($comment->created_date, 'date'); ?>
                                                    </span>
                                                </div>
                                                <div class="d-block">
                                                    <span class="text-secondary">
                                                        <?php is($comment->comment, 'show'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php is_user_login() and print (SITE_URL . 'Page/deleteComment/' . $comment->id) or print(SITE_URL . 'login/?' . $redirect_url); ?>">Delete</a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        <?php else : ?>
                            <button class="btn btn-outline-secondary btn-block bg-white text-secondary">
                                Please sign in or register to post comments.
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="py-2 px-1">
                        <p class="my-2">Related documents</p>
                        <div class="">
                            <?php if (is($related_docs, 'array')) foreach ($related_docs as $doc) : ?>
                                <div class="media d-flex align-items-center border-bottom py-2">
                                    <div class="mr-3">
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
                                    </div>
                                    <div class="media-body">
                                        <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>" class="text-primary">
                                            <?php is($doc->title, 'showCapital'); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title font-weight-bold text-secondary" id="saveModalLabel">
                        Save to a Studylist
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column mb-3">
                        <input type="hidden" name="saveStudylist" value="sdfdf">
                        <?php if (is($studyLists, 'array')) foreach ($studyLists as $studyList) : ?>
                            <div class="p-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="title" class="custom-control-input saveCheck" id="save<?php is($studyList->id, 'show') ?>" value="<?php is($studyList->title, 'show') ?>" <?php is($saved, 'json') and $saved->title == $studyList->title and print('checked'); ?>>
                                    <label class="custom-control-label" for="save<?php is($studyList->id, 'show') ?>">
                                        <?php is($studyList->title, 'show') ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="modal-footer border-0" style="justify-content: flex-start;">
                    <form action="" method="post" id="saveForm">
                        <div class="d-flex" style="align-items: center; justify-content:center">
                            <div class="text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="saveShow">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="text-dark" id="savePlaceholder">Create new Studylist</span>
                            </div>
                            <div id="saveInput" style="display: none;">
                                <div class="d-inline-flex">
                                    <div class="form-group mb-0 ml-3">
                                        <input type="text" id="inputTitle" name="title" class="form-control border-primary" placeholder="Enter Studylist Name">
                                    </div>
                                    <button class="btn btn-primary ml-3" id="saveCreate" name="saveStudylist" value="sfgfsdfsd">Create</button>
                                    <button class="btn btn-light ml-3" id="saveCancel">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="likeModal" tabindex="-1" aria-labelledby="likeModalLabel" aria-hidden="true" style="width: 20%; left: 2%;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title font-weight-bold text-secondary" id="likeModalLabel">
                        Leave a comment or say thanks
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group text-right">
                            <input type="hidden" name="study_doc_id" value="<?php is($document->id, 'show') ?>">
                            <textarea name="comment" id="" rows="3" class="form-input w-100 px-2 py-1 mb-3" placeholder="Comment or ask a question..."></textarea>
                            <button class="btn btn-transparent text-secondary" data-dismiss="modal" aria-label="Close">Skip</button>
                            <button class="btn btn-primary border" name="postComment" value="sdfs">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="" method="post">
                <input type="hidden" name="document_id" value="<?php is($document->id, 'show') ?>">
                <div class="modal-content p-3">
                    <div class="modal-header border-0">
                        <h4 class="modal-title font-weight-bold text-secondary" id="reportModalLabel">
                            Report Document
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="wrongCourse" checked name="reason" class="custom-control-input" value="This document is uploaded under the wrong course">
                            <label class="custom-control-label h5 text-secondary" for="wrongCourse">
                                This document is uploaded under the wrong course
                            </label>
                            <p style="color: #9ea9b5">
                                It belongs to a course other than General Principles of Law of Torts
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="wrongTitle" name="reason" class="custom-control-input" value="The title or description is wrong">
                            <label class="custom-control-label h5 text-secondary" for="wrongTitle">
                                The title or description is wrong
                            </label>
                            <p style="color: #9ea9b5">
                                The content of the document isn't accurately described
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="lowQuality" name="reason" class="custom-control-input" value="Low quality or useless content">
                            <label class="custom-control-label h5 text-secondary" for="lowQuality">
                                Low quality or useless content
                            </label>
                            <p style="color: #9ea9b5">
                                The content may be irrelevant, contain just the course outline/lecture slides, has many spelling/grammar errors or is (nearly) blank.
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="readble" name="reason" class="custom-control-input" value="Readability issue">
                            <label class="custom-control-label h5 text-secondary" for="readble">
                                Readability issue
                            </label>
                            <p style="color: #9ea9b5">
                                The document is difficult to read because of poor handwriting or a low quality scan/photo.
                            </p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="otherReason" name="reason" class="custom-control-input">
                            <label class="custom-control-label h5 text-secondary" for="otherReason">
                                Other Reason
                            </label>
                            <div class="form-group mt-3 collapse" id="reasonContainer">
                                <label for="otherReasonText" class="text-secondary">
                                    Please inform us about your reason to report this question:
                                </label>
                                <textarea name="reasonText" class="form-control" id="otherReasonText"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right border-0 bg-white">
                        <button class="btn btn-light border-secondary" type="reset" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn btn-primary ml-3" name="reportSubmit" value="sdfsdfsfsdfsd">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Share Document</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $redirect_url ?>" target="_blank">
                        Share on Facebook
                    </a>
                    <a href="//web.whatsapp.com/send?text=<?php echo $redirect_url ?>" data-action="share/whatsapp/share" target="_blank" class="ml-3">
                        Share to whatsapp
                    </a><br>
                    <div class="row mt-5">
                        <div class="col-md-9">
                            <input type="text" value="<?php echo $redirect_url ?>" id="myInput" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button onclick="myFunction()" class="btn btn-success">Copy text</button>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



    <script src="<?php echo SITE_URL; ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo SITE_URL; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <?php if (is($fileType) && (strtoupper($fileType) === 'PDF')) : ?>
        <script>
            var url = '<?php echo SITE_URL ?><?php is($document->file, 'show'); ?>';

            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var pdfjsLib = window['pdfjs-dist/build/pdf'];

            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

            var pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 1.5,
                canvas = document.getElementById('the-canvas'),
                ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;
                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport({
                        scale: scale
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                // Update page counters
                document.getElementById('page_num').textContent = num;
            }

            /**
             * If another page rendering in progress, waits until the rendering is
             * finised. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            /**
             * Displays previous page.
             */
            function onPrevPage() {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                queueRenderPage(pageNum);
            }
            document.getElementById('prev').addEventListener('click', onPrevPage);

            /**
             * Displays next page.
             */
            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum);
            }
            document.getElementById('next').addEventListener('click', onNextPage);

            /**
             * Asynchronously downloads PDF.
             */
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;

                // Initial/first page rendering
                renderPage(pageNum);
            });

            var zoominbutton = document.getElementById("zoominbutton");
            zoominbutton.onclick = function() {
                scale = scale + 0.25;
                renderPage(pageNum);
            }

            var zoomoutbutton = document.getElementById("zoomoutbutton");
            zoomoutbutton.onclick = function() {
                if (scale <= 0.25) {
                    return;
                }
                scale = scale - 0.25;
                renderPage(pageNum);
            }
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(() => {

            $('input[type=radio]').change(function(e) {
                if ($('#otherReason').is(':checked')) {
                    $('#reasonContainer').collapse('show')
                }
                if (!$('#otherReason').is(':checked')) {
                    $('#reasonContainer').collapse('hide');
                }
            })

            $('#hideDocSidebar').click(() => {
                if ($('#sidebarCtn').hasClass('col-md-3')) {
                    $('#docHeader').css('width', '90vw');
                    $("#sidebarDocs").hide();
                    $('#sidebarCtn').removeClass('col-md-3').addClass('col-md-1')
                    $('#sidebarWrapper').removeClass('col-md-9').addClass('col-md-11')
                } else {
                    $('#docHeader').css('width', '75vw');
                    $('#sidebarDocs').show();
                    $('#sidebarCtn').removeClass('col-md-1').addClass('col-md-3')
                    $('#sidebarWrapper').removeClass('col-md-11').addClass('col-md-9')
                }

            })

            $('#saveShow').click(e => {
                e.preventDefault();
                $('#saveInput').show();
                $('#savePlaceholder').hide();
            });

            $('#saveCancel').click(e => {
                e.preventDefault();
                $('#saveInput').hide();
                $('#savePlaceholder').show();
            })

            $('.saveCheck').change(function() {
                if (this.checked) {
                    $('#inputTitle').val($(this).val())
                    $('#saveForm').submit();
                } else {
                    $('#inputTitle').val('')
                    $('#saveForm').submit();
                }
            });

            $('#likeModal').on('hidden.bs.modal', function(e) {
                window.location.href = "<?php echo SITE_URL; ?>helpful/<?php is($document->id, 'show') ?>/1"
            })
        })
    </script>
    <script language="javascript">
        function fbshareCurrentPage() {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href) + "&t=" + document.title, '',
                'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
            return false;
        }
    </script>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            //alert("Copied the text: " + copyText.value);
        }
    </script>