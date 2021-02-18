<!-- container -->
<?php
/* echo '<pre>';
print_r($data['Sliders']);
echo '</pre>';
die; */
?>

<!-- SERVICES  creative v6-->
<section>

	<div class="container">
		<div class="heading m-b-40">
			<h2>SERVICES WE OFFERED</h2>
		</div>

		<div class="row">
			<?php

			if (!empty($data["facility"])) {
				foreach ($data['facility'] as $faciliti) {
			?>




					<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="0">
						<div class="icon-box effect medium border small">
							<div class="icon">
								<a href="#"><i class="fa fa-star" aria-hidden="true"></i>
								</a>
							</div>
							<h3><?= $faciliti->title ?></h3>
							<p><?= $faciliti->description ?></p>
						</div>
					</div>





			<?php
				}
			} ?>
		</div>

	</div>

</section>
<!-- end: SERVICES creative v6 -->

<!-- WELCOME -->
<section class="background-blue">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h4 class="m-b-10">Know More</h4>
				<h2 class="m-b-10">About Our Company</h2>
				<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Proin gravida nibh vel velit auctor Aenean sollicitudin, adipisicing elit sed lorem quis bibendum auctor ibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Proin gravida nibh vel velit auctor Aenean sollicitudin, adipisicing elit sed lorem quis.
				</p>
				<a href="#" class="btn btn-dark"><span class="btn-label"><i class="fa fa-check"></i></span>Explore more</a>
			</div>
			<div class="col-lg-6 offset-1 m-t-50">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/3GbqiYfJ60Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>

	</div>
</section>
<!-- end: WELCOME -->

<!-- Shop products -->
<section>
	<div class="container">

		<div class="heading m-b-40">
			<h2>Featured products</h2>
		</div>

		<!--Product list-->

		<div class="shop">
			<div class="row">
				<?php
				if (!empty($data['products'])) {
					foreach ($data['products'] as $prod) {
				?>
						<div class="col-lg-3">

							<div class="product">

								<div class="product-image">

									<a href="#"><img alt="Shop product image!" src="<?= $prod->image ?>">
									</a>
									<a href="#"><img alt="Shop product image!" src="<?= $prod->image ?>">
									</a>
									<span class="product-new">NEW</span>
									<span class="product-wishlist">
										<a href="#"><i class="fa fa-heart"></i></a>
									</span>
									<div class="product-overlay">
										<a href="shop-product-ajax-page.html" data-lightbox="ajax">Quick View</a>
									</div>


									<div class="product-description">
										<div class="product-category"><?= $prod->description ?></div>
										<div class="product-title">
											<h3><a href="#"><?= $prod->title ?></a></h3>
										</div>
										<div class="product-price"><ins><?= $prod->sell_price ?></ins>
										</div>
										<div class="product-rate">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</div>
										<div class="product-reviews"><a href="#">6 customer reviews</a>
										</div>
									</div>
								</div>


							</div>


						</div>






				<?php
					}
				}
				?>
			</div>

		</div>


	</div>
	</div>
	</div>
</section>
<!-- end: Shop products -->

<!-- Testimonial Grid -->
<section>
	<div class="container">
		<!-- Testimonials -->
		<div class="grid-layout grid-3-columns testimonial" data- data-item="grid-item">
			<?php
			if (!empty($data['testimonials'])) {
				foreach ($data['testimonials'] as $testimonial) {
			?>
					<div class="grid-item">
						<!-- Testimonials item -->


						<div class="testimonial-item">



							<img src="<?= $testimonial->image ?>" alt="">
							<p><?= $testimonial->comment ?></p>
							<span><?= $testimonial->name ?></span>
							<!-- <span>CEO, Square Software.</span> -->

						</div>
						<!-- end: Testimonials item-->


					</div>



			<?php
				}
			} ?>
		</div>
		<!-- end: Testimonials -->
	</div>
</section>
<!-- end: Testimonial Grid -->