<!-- footer part start-->
<footer class="footer-area bg-dark pt-5 pb-0">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-sm-6">
				<div class="row">
					<?php foreach ($cat_courses as $cat_name => $courses_arr) : ?>
						<div class="col-md-6 mb-3">
							<h6 class="text-white"><?= ucfirst($cat_name) ?></h6>
							<ul class="list-group">
								<?php foreach ($courses_arr as $course_key => $course) : ?>
									<li class="nav-item">
										<a class="dropdown-item pl-0 text-white-50 bg-dark" href="<?= SITE_URL . 'course/' . $course->post_slug ?>">
											- <?= ucfirst($course->post_title)  ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-md-6">
						<h6 class="text-white">USEFULL LINK</h6>
						<ul>
							<li><a href="<?php echo SITE_URL; ?>about-us" class="text-white-50">ABOUT US</a></li>
							<li><a href="<?php echo SITE_URL; ?>career" class="text-white-50">CAREER WITH US</a></li>
							<li><a href="<?php echo SITE_URL; ?>director-message" class="text-white-50">DIRECTOR MESSAGE</a></li>
							<li><a href="<?php echo SITE_URL; ?>blogs" class="text-white-50">OUR BLOGS</a></li>
							<li><a href="<?php echo SITE_URL; ?>privacy-policy" class="text-white-50">PRIVACY POLICY</a></li>
							<li><a href="<?php echo SITE_URL; ?>term-and-conditions" class="text-white-50">TERM & CONDITIONS</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<div class="single-footer-widget footer_2">
							<h6 class="text-white">FOLLOW US</h6>
							<div class="single-footer-widget footer_2 mb-5">
								<div class="social_icon">
									<a href="<?php is($site->facebook, 'show'); ?>"> <i class="ti-facebook h2"></i> </a>
									<a href="<?php is($site->twitter, 'show'); ?>"> <i class="ti-twitter-alt h2"></i> </a>
									<a href="<?php is($site->instagram, 'show'); ?>"> <i class="ti-instagram h2"></i> </a>
									<a href="<?php is($site->youtube, 'show'); ?>"> <i class="ti-youtube h2"></i> </a>
								</div>
							</div>
							<div class="contact_info">
								<h6 class="text-white-50">FIRST PRIZE CAREER INSTITUTE</h6>
								<p>
									<i class="ti-home text-white h6"></i> &nbsp;&nbsp;<?php is($site->site_address, 'showCapital'); ?>
								</p>
								<p>
									<i class="ti-mobile text-white h6"></i> &nbsp;&nbsp;
									<a class="text-white-50" href="tel://<?php is($site->site_mobile, 'show'); ?>">
										+91 <?php is($site->site_mobile, 'show'); ?>
									</a>,
									<a class="text-white-50" href="tel://<?php is($site->site_mobile_2, 'show'); ?>">
										+91 <?php is($site->site_mobile_2, 'show'); ?>
									</a>
								</p>
								<p>
									<i class="ti-email text-white h6"></i> &nbsp;&nbsp;
									<a class="text-white-50" href="mailto://<?php is($site->email, 'show'); ?>">
										<?php is($site->email, 'show'); ?>
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="container mb-4">
		<hr class="w-100 border-white">
		<div class="row">
			<div class="col-md-12">
				<h5 class="text-light">ABOUT FIRST PRIZE CAREER INSTITUTE</h5>
				<p><?php echo SITE_NAME; ?> is one of the fastest growing entrance test prep coaching institute building the conceptual & technology-based education system for India’s most challenging engineering entrance exam JEE for the admission in IITs which are world’s recognized & prestigious engineering institutes. </p>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright_part_text text-center mt-4 bg-white">
					<div class="row">
						<div class="col-md-3 text-left pl-5">
							<a href="<?php echo SITE_URL; ?>">
								<img class="w-50 mb-3" src="<?php is($site->site_logo, 'show'); ?>" alt="">
							</a>
						</div>
						<div class="col-md-6">
							<p class="footer-text m-0">
								Copyright &copy;
								<script>
									document.write(new Date().getFullYear());
								</script>
								All rights reserved | This website is made by <a href="https://www.twstechnology.com/" target="_blank">TWS Technology</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- footer part end-->


<!-- Signup modal-->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content signup-form">
			<div class="modal-header border-bottom-0">
				<h5 class="modal-title" id="exampleModalLabel">Free Signup & Enjoy Learning!!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= SITE_URL ?>add/user-fe" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name1">Name</label>
								<input type="hidden" name="current_url" value="<?php echo base_url(uri_string()); ?>">
								<input type="name" class="form-control" id="name1" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
								<!-- <small id="nameHelp" class="form-text text-muted">required*</small> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email1">Email</label>
								<input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
								<!-- <small id="emailHelp" class="form-text text-muted">required*</small> -->
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile</label>
						<input type="mobile" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="Enter mobile">
						<!-- <small id="mobileHelp" class="form-text text-muted">required*</small> -->
					</div>
					<div class="modal-footer border-top-0 d-flex " style="justify-content: left;">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" id="signup-show" name="user_add" value="user_signup" class="btn_1">Sign Up</button>
							</div>

							<div class="col-md-12">
								<br>
								<p>Already Have Account. Click <span id="login-show" style="color: brown; cursor:pointer">here</span> to Login</p>
							</div>
						</div>

					</div>

				</form>
			</div>
		</div>
		<div class="modal-content login-form" style="display: none;">
			<div class="modal-header border-bottom-0">
				<h5 class="modal-title" id="exampleModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= SITE_URL ?>add/user-login-fe" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="hidden" name="current_url" value="<?php echo base_url(uri_string()); ?>">
								<input type="email" class="form-control" id="email_login" name="email_login" aria-describedby="emailHelp" placeholder="Enter email">
								<!-- <small id="nameHelp" class="form-text text-muted">required*</small> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password_login" name="password_login" aria-describedby="emailHelp" placeholder="Enter password">
								<!-- <small id="emailHelp" class="form-text text-muted">required*</small> -->
							</div>
						</div>
					</div>
					<div class="modal-footer border-top-0 d-flex" style="justify-content: left; padding-left: -16px;">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" id="signup-show" name="user_login" value="user_signup" class="btn_1">Login</button>
							</div>
							<div class="col-md-12">
								<br>
								<p>New to <?= $site->site_name ?>. Click <span id="signup" style="color: brown; cursor:pointer">here</span> to SignUp</p>
							</div>
						</div>

					</div>

				</form>

			</div>
		</div>
	</div>
</div>



<!-- jquery plugins here-->
<!-- jquery -->
<script src="<?= SITE_URL ?>assets/insti/js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="<?= SITE_URL ?>assets/insti/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?= SITE_URL ?>assets/insti/js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="<?= SITE_URL ?>assets/insti/js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="<?= SITE_URL ?>assets/insti/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="<?= SITE_URL ?>assets/insti/js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="<?= SITE_URL ?>assets/insti/js/owl.carousel.min.js"></script>
<script src="<?= SITE_URL ?>assets/insti/js/jquery.nice-select.min.js"></script>
<!-- swiper js -->
<script src="<?= SITE_URL ?>assets/insti/js/slick.min.js"></script>
<script src="<?= SITE_URL ?>assets/insti/js/jquery.counterup.min.js"></script>
<script src="<?= SITE_URL ?>assets/insti/js/waypoints.min.js"></script>

<!-- custom js -->
<script src="<?= SITE_URL ?>assets/insti/js/custom.js"></script>

<!-- formjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.js"></script>
<!-- form js -->

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	if ($('#paymentForm').length) {
		$('input[type=checkbox]').change(function(e) {
			if ($('#type_online').prop('checked') == true && $('#type_printed').prop('checked') == true) {
				$('#finalPrice').val(parseInt($('#online_price').val()) + parseInt($('#printed_price').val()));
				$('#total_price').html(parseInt($('#online_price').val()) + parseInt($('#printed_price').val()));
			} else if ($('#type_online').prop('checked') == true) {
				$('#finalPrice').val($('#online_price').val());
				$('#total_price').html($('#online_price').val());
			} else if ($('#type_printed').prop('checked') == true) {
				$('#finalPrice').val($('#printed_price').val());
				$('#total_price').html($('#printed_price').val());
			} else {
				$('#finalPrice').val('0');
				$('#total_price').html('0');
			}
		});

		$('#paymentBtn').click(function(e) {
			e.preventDefault();

			if ($('#finalPrice').val() !== '' && $('#finalPrice').val() != '0') {
				var rzp1 = new Razorpay({
					key: "rzp_test_q6H7PSDQ2Y3agp",
					amount: ($('#finalPrice').val() * 100), // 2000 paise = INR 20
					name: "<?php echo SITE_NAME; ?>",
					description: "To Complete Your Order, Pay ",
					prefill: {
						name: '<?php is($_SESSION['USER_NAME'], 'show') ?>',
						email: '<?php is($_SESSION['USER_EMAIL'], 'show') ?>',
						contact: '<?php is($_SESSION['USER_MOBILE'], 'show') ?>',
					},
					handler: function(response) {
						if (typeof response.razorpay_payment_id == 'undefined' || response.razorpay_payment_id < 1) {
							alert('unsuccess Payment');
							location.reload(true);
						} else {
							// alert(response);
							// console.table(response);
							$('#transitionId').val(response.razorpay_payment_id);
							$('#paymentForm').submit();
						}
					},
					theme: {
						color: "#316eff"
					}
				});
				rzp1.open();
			} else {
				alert('Please Select Atleast One Type.');
			}
		})
	}
</script>


<script>
	$(document).ready(function() {

		$("#login-show").click(function() {
			$(".signup-form").hide();
			$(".login-form").show();
			$('#displayBtn').html('Login');

			// $("#login-show").hide();
			// $(".button_submit").show();
		});

		$("#signup").click(function() {
			$(".signup-form").show();
			$(".login-form").hide();
			$('#displayBtn').html('Free Signup');

			// $("#login-show").hide();
			// $(".button_submit").show();
		});

		if ($('#job_id').length) {
			$('#job_id').change(function(e) {
				if ($('#job_id').val() === '1') {
					$('#subs').collapse('show')
				} else {
					$('#subs').collapse('hide')
				}
			});
		}


		if ($('#apply_for_class').length) {
			$('#apply_for_class').change(function(e) {
				let classes = $('#apply_for_class').val();

				classes = parseInt(classes.replace("th", ""));

				if (classes > 8) {
					$('#tableShow').collapse('show');

					$('#class_name_1').html(classes - 2 + 'th');
					$('#class_1').val(classes - 2);


					$('#class_name_2').html(classes - 1 + 'th');
					$('#class_2').val(classes - 1);
				} else {
					$('#tableShow').collapse('hide')
				}
			});
		}

		if ($('#owl-demo').length) {
			$('#owl-demo').owlCarousel({
				navigation: false, // Show next and prev buttons
				pagination: false,
				dots: false,

				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,

				slideSpeed: 300,
				paginationSpeed: 400,

				items: 1,
				itemsDesktop: false,
				itemsDesktopSmall: false,
				itemsTablet: false,
				itemsMobile: false
			})
		}
	});
</script>

<?php if (!isset($_SESSION['USER_EMAIL']) && empty($_SESSION['USER_EMAIL'])) : ?>
	<script>
		$(document).on('click', '#download-btn', function() {
			$('#form').modal('show');
		});
	</script>
<?php endif; ?>

</body>

</html>