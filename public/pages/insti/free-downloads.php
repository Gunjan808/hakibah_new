<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_iner text-center">
					<div class="breadcrumb_iner_item">
						<h2>Free Downloads</h2>
						<p>Home<span>/</span>Free Downloads</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- breadcrumb start-->

<!--::review_part start::-->
<section class="special_cource padding_top">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-5">
				<div class="section_tittle text-center">
					<p>popular courses</p>
					<h2>Free Downloads</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data['freeDownlods'] as $key => $course) : ?>
				<div class="col-sm-6 col-lg-4">
					<div class="single_special_cource">
						<img src="<?= $course['post_image'] ?>" class="special_img" alt="">
						<div class="special_cource_text">
							<a href="#" class=""><?= get_title('categories', $course['category_id']) ?></a>

							<h4><?= $course['sale_price'] ?></h4>
							<a href="course-details.html">
								<h3><?= $course['title'] ?></h3>
							</a>
							<p><?= $course['short_description'] ?></p>
							<div class="author_info">
								<div class="author_img" style="padding-left: 0px !important; ">
								</div>
								<div class="author_rating">
									<?php if (!is($_SESSION['USER_EMAIL'])) : ?>
										<a id="download-btn" class="btn_4 ">Download</a>
									<?php endif; ?>
									<?php if (is($_SESSION['USER_EMAIL'])) : ?>
										<a href="<?php echo $course['attachment'] ?>" class="btn_4 download-btn">download</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--::blog_part end::-->