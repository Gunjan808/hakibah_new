 <!-- breadcrumb start-->
 <?php
	// echo '<pre>';
	// print_r($data);
	// echo '</pre>';

	?>
 <section class="breadcrumb breadcrumb_bg">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12">
 				<div class="breadcrumb_iner text-center">
 					<div class="breadcrumb_iner_item">
 						<h2>My Profile</h2>
 						<p>Home<span>/<span>Profile</p>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- breadcrumb start-->

 <!-- ================ contact section start ================= -->
 <section class="contact-section section_padding">
 	<div class="container">
 		<div class="row">
 			<div class="col-12">
 				<h2 class="contact-title">My Profile</h2>
 			</div>
 			<div class="col-lg-4">
 				<div class="form-group">
 					<span>Name:</span>
 					<?php echo $data['user']['first_name'] ?>
 				</div>
 				<div class="form-group">
 					<span>Email:</span>
 					<?php echo $data['user']['email'] ?>
 				</div>
 				<div class="form-group">
 					<span>DOB:</span>
 					<?php echo $data['user']['dob'] ?>
 				</div>
 				<div class="form-group">
 					<span>Gender:</span>
 					<?php echo $data['user']['gender'] ?>
 				</div>
 			</div>
 			<div class="col-lg-8">
 				<img src="<?php echo $data['user']['profile_pic'] ?>">


 			</div>
 		</div>
 	</div>
 </section>
 <!-- ================ contact section end ================= -->
