<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_iner text-center">
					<div class="breadcrumb_iner_item">
						<h2>Courses</h2>
						<p>Home<span>/</span>Courses</p>
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
					<h2>Courses</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data['courses'] as $key => $course) : ?>
				<div class="col-sm-6 col-lg-4">
					<div class="single_special_cource">
						<img src="<?= $course['post_image'] ?>" class="special_img" alt="">
						<div class="special_cource_text">
							<div class="row">

								<div class="col-md-12">
									<a href="<?php echo SITE_URL; ?>course/<?php is($course['slug'], 'show') ?>" class="btn_4 mb-3 px-1 py-1"><?= get_title('categories', $course['category_id']) ?></a>
									<a href="<?php echo SITE_URL; ?>course/<?php is($course['slug'], 'show') ?>">
										<h3 style="margin-top: 0px;"><?= $course['title'] ?></h3>
									</a>
								</div>
								<div class="col-md-12 mt-3">

									<?= is($course['regular_price']) ? '<h5 style="float: left; text-align:left;"><strike>Rs. ' . $course['regular_price'] . '/- </strike>&nbsp;&nbsp;&nbsp;&nbsp;</h5>' : ''  ?>
									<h4 style="float: left; text-align:left; margin-top:-3px">
										<?= is($course['sale_price']) ? 'Rs. ' . $course['sale_price'] . '/- ' : 'FREE'  ?>
									</h4>

								</div>
							</div>
							<p><?= $course['short_description'] ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--::blog_part end::-->