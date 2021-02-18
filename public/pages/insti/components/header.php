<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= is($site->site_name) ? $site->site_name : 'TWS Technology';  ?></title>
	<link rel="icon" href="<?= is($site->site_favicon) ? $site->site_favicon : '';  ?>">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/bootstrap.min.css">
	<!-- animate CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/animate.css">
	<!-- owl carousel CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/owl.carousel.min.css">
	<!-- themify CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/themify-icons.css">
	<!-- flaticon CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/flaticon.css">
	<!-- font awesome CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/magnific-popup.css">
	<!-- swiper CSS -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/slick.css">
	<!-- style CSS -->
	<!-- <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/css/style.css"> -->
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/insti/sass/style.css">
	<!-- css for form pages -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css.map" integrity="undefined" crossorigin="anonymous" />
</head>

<body>
	<!--::header part start::-->
	<header class="main_menu <?= ($this->router->fetch_method() == 'home') || ($this->router->fetch_method() == 'course') || ($this->router->fetch_method() == 'my_profile') || ($this->router->fetch_method() == 'free_download') ? 'home_menu' : 'single_page_menu';  ?>  ">
		<div class="container">

			<div class="row align-items-center">
				<div class="col-lg-12">

					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="<?= SITE_URL ?>"> <img src="<?= ($site->site_logo) ? $site->site_logo : SITE_URL . 'assets/img/insti/logo.png'; ?>" alt="logo" style="max-width:220px;"> </a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
							<ul class="navbar-nav align-items-center">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										About Us
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>career">
											Career With Us
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>about-us">
											Why First Prize
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>director-message">
											Director Message
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>contact-us">
											Contact Us
										</a>
									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Courses
									</a>
									<div class="dropdown-menu mega-menu " style="width: 80vw !important;" aria-labelledby="navbarDropdown">
										<div class="row p-3">
											<?php foreach ($cat_courses as $cat_name => $courses_arr) : ?>
												<div class="col-md-3 col-12 mb-3">
													<h6><?= ucfirst($cat_name) ?></h6>
													<ul class="list-group">
														<?php foreach ($courses_arr as $course_key => $course) : ?>
															<li class="nav-item">
																<a class="dropdown-item" href="<?= SITE_URL . 'course/' . $course->post_slug ?>">
																	<?= ucfirst($course->post_title)  ?>
																</a>
															</li>
														<?php endforeach; ?>
													</ul>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="franchaisy" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Our Partners
									</a>
									<div class="dropdown-menu" aria-labelledby="franchaisy">
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>first-prize-franchise-for-school-coaching">
											First Prize Franchise
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>school-integrated-program">
											School Integrated Program
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>academic-and-monitoring-support">
											Academic & Monitoring Support
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>faculty-training-and-placement">
											Faculty Training & Placement
										</a>
										<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>fp-associate-program">
											FP Associate Program
										</a>
									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Admission
									</a>
									<div class="dropdown-menu mega-menu" style="width: 80vw !important;" aria-labelledby="navbarDropdown">
										<div class="row p-3">
											<?php foreach ($cat_admissions as $cat_name => $courses_arr) : ?>
												<div class="col-3 mb-3">
													<h6><?= ucfirst($cat_name) ?></h6>
													<ul class="list-group">
														<?php if (is($cat_name) and strtolower($cat_name) == 'apply online') : ?>
															<li class="nav-item">
																<a class="dropdown-item" href="<?= SITE_URL ?>apply-online">
																	Apply Online
																</a>
															</li>
														<?php endif; ?>
														<?php foreach ($courses_arr as $course_key => $course) : ?>
															<li class="nav-item">
																<a class="dropdown-item" href="<?= SITE_URL . 'admission/' . $course->post_slug ?>">
																	<?= ucfirst($course->post_title)  ?>
																</a>
															</li>
														<?php endforeach; ?>
													</ul>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="<?php echo SITE_URL ?>freedownload">
										Free Downloads
									</a>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Student Zone
									</a>
									<div class="dropdown-menu " aria-labelledby="navbarDropdown">
										<div class="row">
											<div class="col-md-12">
												<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>blogs">Our Blogs</a>
												<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>apply-online">Apply Online</a>
												<?php foreach ($cat_student_zone as $cat_name => $courses_arr) : ?>
													<div class="sub-mega-menu">
														<!-- <h6><?= ucfirst($cat_name)  ?></h6> -->
														<?php foreach ($courses_arr as $course_key => $course) : ?>
															<a class="dropdown-item px-3" href="<?= SITE_URL . 'student-zone/' . $course->post_slug ?>">
																<?= ucfirst($course->post_title)  ?>
															</a>
														<?php endforeach; ?>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</li>

								<?php if (isset($_SESSION['USER_EMAIL']) && !empty($_SESSION['USER_EMAIL'])) : ?>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											My Account
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>myprofile">
												My Profile
											</a>
											<a class="dropdown-item px-3" href="<?php echo SITE_URL ?>logout">
												Logout
											</a>
										</div>
									</li>
								<?php endif; ?>

								<?php if (!is($_SESSION['USER_EMAIL'])) : ?>
									<li class="d-none d-lg-block">
										<!-- <a class="btn_1" href="#">Free Signup</a> -->
										<button type="button" class="btn_1 download-btn" data-toggle="modal" data-target="#form" id="displayBtn">
											Signup
										</button>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header part end-->

	<?php show_message(); ?>
	<?php show_debug($_SESSION); ?>