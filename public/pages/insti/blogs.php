<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_iner text-center">
					<div class="breadcrumb_iner_item">
						<h2>Blogs</h2>
						<p>Home<span>/</span>Blogs</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- breadcrumb start-->

<!--::blog_part start::-->
<section class="blog_part section_padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-5">
				<div class="section_tittle text-center">
					<p>Our Blog</p>
					<h2>Students Blog</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (is($data['blogs'])) foreach ($data['blogs'] as $blog) : ?>
				<div class="col-sm-6 col-lg-4 col-xl-4">
					<div class="single-home-blog    ">
						<div class="card">
							<img src="<?php is($blog->post_image, 'show'); ?>" class="card-img-top" alt="<?php is($blog->slug, 'show'); ?>">
							<div class="card-body">
								<a href="javascript:void(0);" class="btn_4">
									<?php is($blog->category_title, 'showCapital'); ?>
								</a>
								<a href="<?php echo SITE_URL . 'blog/' . $blog->slug; ?>">
									<h5 class="card-title">
										<?php is($blog->title, 'showCapital'); ?>
									</h5>
								</a>
								<p>
									<?php is($blog->short_description, 'show'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--::blog_part end::-->