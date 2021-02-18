<style>
	.breadcrumb:after {
		background-color: #ffffff80;
	}
</style>
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg" style="background: url(<?php echo SITE_URL; ?>assets/insti/img/frn_4.JPG) top center no-repeat; background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_iner text-center">
					<div style="vertical-align: bottom" class="breadcrumb_iner_item">
						<!-- <h1>FACULTY TRAINING AND PLACEMENT</h1> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- breadcrumb start-->

<!-- ================ contact section start ================= -->
<section class="contact-section py-5	">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="mb-5">
					<div class="mb-3">
						<h3>FACULTY TRAINING AND PLACEMENT</h3>
						<p>Teachers lay the foundation for a child’s learning curve and are instrumental in accelerating their career path. We provide top-class Faculty Support for you to base your institute on a strong foundation. These teachers are proficient in various subjects – Physics, Chemistry, Mathematics & Biology and have been mentored by HODs of eminentand top institutes of Kota. Since the integration of entrance examinations and monumental challenges posed by coaching hubs like Kota, there is an ever-increasing demand of qualified teachers by local coaching institutes and school across the nation. To prevent migration of good students to these coaching hubs, we have partnered with many institutes over the years to connect them with suitable faculty members.</p>
					</div>
				</div>

				<div class="row my-5">
					<div class="col-md-4">
						<h5>
							<span>
								<img src="<?php echo SITE_URL; ?>assets/insti/img/5.png" class="mr-3" style="width: 10%" alt="EMPANELMENT OF FACULTY">
							</span> EMPANELMENT OF FACULTY
						</h5>
						<p class="text-justify">
							Our large talent-pool of experienced & procient Faculty boast of varied experience and proles. Our teachers are well-trained in Kota's teaching methodology and well-equipped to align their teaching style as per the requirements of each student, their pace and learning levels. We shortlist them as per your institute's specic requirements, test and certify them and place them accordingly.
						</p>
						<ol>
							<li class="mb-2">
								<p class="text-justify">
									Set of Physics, Chemistry, Math’s and Biology for Senior division (IIT-JEE & NEET)
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									Set of Physics, Chemistry, Math’s and Biology for pre foundation division (6 th to 10 th & Olympiads)
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									We will also assist with back up Faculty in case of any requirements mid-session.
								</p>
							</li>
						</ol>
					</div>
					<div class="col-md-4">
						<h5>
							<span>
								<img src="<?php echo SITE_URL; ?>assets/insti/img/5.png" class="mr-3" style="width: 10%" alt="TRAINING OF FACULTY">
							</span> TRAINING OF FACULTY
						</h5>
						<p class="text-justify">
							We provide training to academic staff by orienting and teaching them Kota’s result driven teaching methodology. School and institutes require more robust Faculty are well-aware and equipped with the latest trends in engineering and Medical education and entrance examinations. Our Training Program includes Teaching Notes, Video Lectures & Lecture Notes of Eminent Faculties , Syllabus Planner & Schedule, Academic Planning, Question Banks, Class Illustrations etc.that equips and updates them with trends of competitive exams like NEET , IIT JEE , NTSE and Olympiads. This program can be availed in the following ways:
						</p>
						<ol>
							<li class="mb-2">
								<p class="text-justify">
									On Board Training in Kota
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									On Site training at your Location
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									Online training
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									Combination of the above
								</p>
							</li>
						</ol>
					</div>
					<div class="col-md-4">
						<h5>
							<span>
								<img src="<?php echo SITE_URL; ?>assets/insti/img/5.png" class="mr-3" style="width: 10%" alt="TRAINING FOR FRESHERS">
							</span> TRAINING FOR FRESHERS
						</h5>
						<p class="text-justify">
							This program is for academics who have started their career in Teaching.
						</p>
						<h6>Training Programs:</h6>
						<ol>
							<li class="mb-2">
								<p class="text-justify">
									6 Days Orientation Training
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									45 days training to develop expertise in Kota coaching methodology.
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									3 Months, 6 Months & 9 Months three set of comprehensive training along with placement for freshers.
								</p>
							</li>
						</ol>
						<h6>Teaching Assistance:</h6>
						<ol>
							<li class="mb-2">
								<p class="text-justify">
									Teaching notes, class notes and proven illustrations of Kota Faculties
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									Video Lectures of Top Faculties of Kota
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									Study material, question bank, test papers, etc.
								</p>
							</li>
						</ol>
						<h6>Job Opportunities</h6>
						<ol>
							<li class="mb-2">
								<p class="text-justify">
									Introduced to hundreds of institutes & our Francise or School Integrated Program
								</p>
							</li>
							<li class="mb-2">
								<p class="text-justify">
									Custom opportunities or explore job opportunities yourself as per your requirement
								</p>
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<form method="post" action="<?php echo SITE_URL; ?>addFrancise" class="bg-light p-3 rounded-lg">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="hidden" name="currentUrl" value="<?php is($_SERVER['REDIRECT_QUERY_STRING'], 'show'); ?>">
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<label for="mobile">Mobile Number</label>
						<input type="tel" minlength="10" maxlength="10" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile">
					</div>
					<div class="">
						<label for="association">Association Type</label>
						<div class="form-group">
							<select name="association" id="association" class="w-100">
								<option selected hidden disabled>Apply For</option>
								<?php foreach (['First Prize Franchise', 'School Integrated Program', 'Academic & Monitoring Support', 'Faculty Training & Placement', 'FP Associate Program'] as $value) : ?>
									<option value="<?php is($value, 'show') ?>">
										<?php is($value, 'show'); ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group mt-5">
						<label for="profession">Profession</label>
						<input type="text" class="form-control" id="profession" name="profession" placeholder="Enter Profession">

					</div>
					<div class="form-group">
						<label for="state">State</label>
						<input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
					</div>
					<div class="form-group">
						<label for="pincode">Pincode</label>
						<input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea name="address" id="address" rows="3" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<textarea name="message" id="message" rows="3" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="frAdd" value="sdfds">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- ================ contact section end ================= -->