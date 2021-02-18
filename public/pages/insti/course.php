<?php is($data['post']) and $post = $data['post'] or show_404(); ?>
<section class="breadcrumb breadcrumb_bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_iner text-center">
					<div class="breadcrumb_iner_item">
						<h2>Course Details</h2>
						<p>Home<span>/</span>Course Details</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- breadcrumb start-->

<!--================ Start Course Details Area =================-->
<section class="course_details_area section_padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 course_details_left">

				<div class="main_image">
					<img class="img-fluid img-course" src="<?php is($post->post_image, 'show'); ?>" alt="">
				</div>
				<div class="content_wrapper">
					<h4 class="title_top">Objectives</h4>
					<div class="content">
						<?php is($post->description, 'show');  ?>
					</div>
				</div>
			</div>


			<div class="col-lg-4 right-contents">
				<form method="post" id="paymentForm">
					<input type="hidden" name="product_id" value="<?php is($post->id, 'show'); ?>">
					<div class="sidebar_top">
						<ul>
							<li>
								<h1 class="color">
									<?php is($post->title, 'showCapital'); ?>
								</h1>
							</li>
							<li>
								<span class="justify-content-between d-flex">
									<p>
										<input type="checkbox" name="type[]" value="online" class="mr-2" id="type_online" checked>
										<input type="hidden" name="online_price" id="online_price" value="<?php is($post->sale_price, 'show') ?>">
										<label for="type_online">Online Lectures</label>
									</p>
									<span>
										<del>Rs. <?php is($post->regular_price, 'show'); ?></del>
										<br>
										<h4>Rs. <?php is($post->sale_price, 'show'); ?></h4>
									</span>
								</span>
							</li>
							<li>
								<span class="justify-content-between d-flex">
									<p>
										<input type="checkbox" name="type[]" value="printed" class="mr-2" id="type_printed">
										<input type="hidden" name="printed_price" id="printed_price" value="<?php is($post->psm_sale_price, 'show') ?>">
										<label for="type_printed">Printed Materials</label>
									</p>
									<span>
										<del>Rs. <?php is($post->psm_regular_price, 'show'); ?></del>
										<br>
										<h4>Rs. <?php is($post->psm_sale_price, 'show'); ?></h4>
									</span>
								</span>
							</li>
							<li>
								<span class="justify-content-between d-flex">
									<h4 for="type_printed">
										<input type="hidden" name="final_price" id="finalPrice" value="<?php is($post->sale_price, 'show') ?>">
										<input type="hidden" name="transition_id" id="transitionId">
										Total Price
									</h4>

									<span>
										<h4>Rs. <span id="total_price"><?php is($post->sale_price, 'show'); ?></span></h4>
									</span>
								</span>
							</li>
						</ul>
						<?php if (!is($_SESSION['USER_EMAIL'])) : ?>
							<button type="button" class="btn_1 d-block download-btn" id="download-btn">Login & Enroll</button>
						<?php endif; ?>
						<?php if (is($_SESSION['USER_EMAIL'])) : ?>
							<button type="submit" id="paymentBtn" name="enrollCourse" value="asdaagaefsd" class="btn_1 d-block">Enroll the course</button>
						<?php endif; ?>
					</div>
				</form>

				<h4 class="title">Reviews</h4>
				<div class="content">
					<div class="review-top row pt-40">
						<div class="col-lg-12">
							<h6 class="mb-15">Provide Your Rating</h6>
							<div class="d-flex flex-row reviews justify-content-between">
								<span>Quality</span>
								<div class="rating">
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
								</div>
								<span>Outstanding</span>
							</div>
							<div class="d-flex flex-row reviews justify-content-between">
								<span>Puncuality</span>
								<div class="rating">
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
								</div>
								<span>Outstanding</span>
							</div>
							<div class="d-flex flex-row reviews justify-content-between">
								<span>Quality</span>
								<div class="rating">
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
									<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
								</div>
								<span>Outstanding</span>
							</div>

						</div>
					</div>
					<div class="feedeback">
						<h6>Your Feedback</h6>
						<textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
						<div class="mt-10 text-right">
							<a href="#" class="btn_1">Read more</a>
						</div>
					</div>
					<div class="comments-area mb-30">
						<div class="comment-list">
							<div class="single-comment single-reviews justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="<?= SITE_URL ?>assets/img/profile-11.jpeg" alt="">
									</div>
									<div class="desc">
										<h5><a href="#">Emilly Blunt</a>
										</h5>
										<div class="rating">
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
										</div>
										<p class="comment">
											Blessed made of meat doesn't lights doesn't was dominion and sea earth
											form
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="comment-list">
							<div class="single-comment single-reviews justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="<?= SITE_URL ?>assets/img/profile-2.jpeg" alt="">
									</div>
									<div class="desc">
										<h5><a href="#">Elsie Cunningham</a>
										</h5>
										<div class="rating">
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
										</div>
										<p class="comment">
											Blessed made of meat doesn't lights doesn't was dominion and sea earth
											form
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="comment-list">
							<div class="single-comment single-reviews justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="<?= SITE_URL ?>assets/img/profile-13.jpeg" alt="">
									</div>
									<div class="desc">
										<h5><a href="#">Maria Luna</a>
										</h5>
										<div class="rating">
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/color_star.svg" alt=""></a>
											<a href="#"><img src="<?= SITE_URL ?>assets/insti/img/icon/star.svg" alt=""></a>
										</div>
										<p class="comment">
											Blessed made of meat doesn't lights doesn't was dominion and sea earth
											form
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Course Details Area =================-->