<?php breadcrumb_start('documents', 'list/documents', 'document_list'); ?>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/components/tabs-accordian/custom-tabs.css">
<style>
	.rounded-pills-icon .nav-pills .nav-link.active,
	.rounded-pills-icon .nav-pills .show>.nav-link {
		background-color: #1b55e2 !important;
	}
</style>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3" method="POST" enctype="multipart/form-data" id="documentAddForm">
				<div id="tabsWithIcons" class="col-xl-12 col-lg-12 col-12 layout-spacing pb-0">
					<div>

						<div class="widget-content widget-content-area rounded-pills-icon">

							<ul class="nav nav-pills mb-4 mt-3" id="rounded-pills-icon-tab" role="tablist" style="justify-content: space-between;">
								<li class="nav-item ml-2 mr-2">
									<a class="nav-link mb-2 text-center <?php is($_SESSION['uploadedDocs'], 'array') and print (' disabled') or print(' active') ?>" id="rounded-pills-icon-home-tab" data-toggle="pill" href="<?php is($_SESSION['uploadedDocs'], 'array') or print('#rounded-pills-icon-home') ?>" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true">
										<?php echo ICONS['award']; ?> Course
									</a>
								</li>
								<li class="nav-item ml-2 mr-2">
									<a class="nav-link mb-2 text-center  <?php is($_SESSION['uploadedDocs'], 'array') and print(' disabled') ?>" id="rounded-pills-icon-profile-tab" data-toggle="pill" href="<?php is($_SESSION['uploadedDocs'], 'array') or print('#rounded-pills-icon-profile') ?>" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false">
										<?php echo ICONS['upload']; ?> Upload
									</a>
								</li>
								<li class="nav-item ml-2 mr-2">
									<a class="nav-link mb-2 text-center <?php is($_SESSION['uploadedDocs'], 'array') and print(' active') ?>" id="rounded-pills-icon-contact-tab" data-toggle="pill" href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact" aria-selected="false">
										<?php echo ICONS['file']; ?> Details
									</a>
								</li>
								<li class="nav-item ml-2 mr-2">
									<a class="nav-link mb-2 text-center" id="rounded-pills-icon-offer-tab" data-toggle="pill" href="#rounded-pills-icon-offer" role="tab" aria-controls="rounded-pills-icon-offer" aria-selected="false">
										<?php echo ICONS['gift']; ?> Offer
									</a>
								</li>
							</ul>
							<div class="tab-content" id="rounded-pills-icon-tabContent">
								<div class="tab-pane fade <?php is($_SESSION['uploadedDocs'], 'array') or print('show active') ?>" id="rounded-pills-icon-home" role="tabpanel" aria-labelledby="rounded-pills-icon-home-tab">
									<div class="card" style="border-top: 8px solid var(--primary)">
										<div class="card-header px-4 pt-4">
											<h5 class="card-title">
												<span class="text-primary">Step 1:</span>
												<span class="text-dark">
													Choose a course for which you'd like to upload documents
												</span>
											</h5>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-2 pl-4 pt-2">
															<label for="university-search">University:</label>
														</div>
														<div class="col-md-10">
															<select class="form-control" data-tags="true" data-placeholder="Select a University" name="university_id" id="university-search"></select>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-2 pl-4 pt-2">
															<label for="uploadCourse">Course:</label>
														</div>
														<div class="col-md-10">
															<select class="form-control" data-tags="true" data-placeholder="Select a Course" name="course_id" id="uploadCourse"></select>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="row mb-2">
														<div class="col-md-2 pl-4 pt-2">
															<label for="uploadCourse">Image:</label>
														</div>
														<div class="col-md-10">
															<?php file_input('profileImg'); ?>
														</div>
													</div>
												</div>
												<div class="col-md-6"></div>
												<div class="col-md-6 ">
													<span class="btn btn-info mb-2 float-right" id="next-1">
														Next
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">

									<!-- Document Image -->
									<style>
										* {
											transition: all 100ms ease-in-out;
										}

										.imageWrapper>.imageContainer {
											background: #eee;
											width: 100%;
											padding: 5%;
											height: 40vh;
											border: 2px dashed #aaa;
											display: grid;
											border-radius: 20px;
											transform: scale(1);
										}

										.imageWrapper>.imageContainer.hover {
											background: #aaa;
											border: 2px dashed transparent;
											color: #eee;
											transform: scale(0.98);
										}

										.imageWrapper>.imageContainer>.text {
											place-self: center;
											font-size: 20px
										}

										.imageWrapper>.imageContainer>.inputFile {
											display: none;
										}

										.imageWrapper>.previewContainer {
											margin-top: 2%;
											padding: 2% 3%;
											background: #eee;
											border-radius: 15px;
										}

										.imageWrapper>.previewContainer>.previewCard {
											display: flex;
											background: #fff;
											border-radius: 25px;
											box-shadow: 0 10px 20px #00000050;
											margin-top: 1.5%;
											margin-bottom: 1.5%;
										}

										.imageWrapper>.previewContainer>.previewCard.isComplete {
											background: #14ff0045;
										}

										.imageWrapper>.previewContainer>.previewCard.isFailed {
											background: #14ff0045;
										}

										.imageWrapper>.previewContainer>.previewCard>.previewImage {
											width: 10%;
											padding: 2%;
										}

										.imageWrapper>.previewContainer>.previewCard>.textContainer {
											margin-left: 1%;
											padding: 2% 3%;
										}

										.imageWrapper>.previewContainer>.previewCard>.previewActin {
											display: grid;
											place-content: center;
											margin-left: auto;
											margin-right: 3%;
										}

										.imageWrapper>.previewContainer>.previewCard>.previewActin>.btns {
											display: inline-flex;
											align-content: space-between;
											cursor: pointer;
										}

										.imageWrapper>.previewContainer>.previewCard>.previewActin>.btns>button {
											all: unset;
											pointer-events: none;
										}

										.imageWrapper>.previewContainer>.previewCard>.previewActin>.btns>button:first-child {
											margin-right: 5%;
										}
									</style>
									<div class="imageWrapper">
										<label for="docImgInput" class="imageContainer" id="imageContainer" draggable="true" dropzone="true">
											<div class="text-center">
												<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud">
													<polyline points="16 16 12 12 8 16"></polyline>
													<line x1="12" y1="12" x2="12" y2="21"></line>
													<path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
													<polyline points="16 16 12 12 8 16"></polyline>
												</svg>
											</div>
											<h2 class="text-center" style="font-size: 32px;">
												Drag & Drop Files
											</h2>
											<span class="text-center mb-3">Or if you perfer</span>
											<label for="docImgInput" class="btn btn-primary mx-auto" style="width: 15%;">Browse my files</label>
											<input type="file" name="docImg" id="docImgInput" class="inputFile" accept=".jpg,.doc,.docx,.pdf">
										</label>
										<div class="previewContainer d-none" id="previewContainer"></div>
									</div>
									<div class="row">
										<div class="col-6"></div>
										<div class="col-6">
											<button id="btnUpload" type="button" name="uploadDoc" value="adfsfd" class="mt-4 btn btn-primary disabled float-right">Upload & Next</button>
										</div>
									</div>

								</div>
								<div class="tab-pane fade  <?php is($_SESSION['uploadedDocs'], 'array') and print('show active') ?>" id="rounded-pills-icon-contact" role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
									<?php if (is($_SESSION['uploadedDocs'], 'array')) : ?>
										<?php foreach ($_SESSION['uploadedDocs'] as $doc) : ?>
											<div class="row my-4 shadow p-5" style="border-radius: 25px;">

												<div class="col-md-12">
													<input type="hidden" name="doc_id[]" value="<?php is($doc['id'], 'show') ?>">
													<h3 class="mb-4">
														<img src="<?php is($doc['file']) and (strpos($doc['file'], '.pdf') !== false and print (SITE_URL . 'assets/img/pdf.svg') or print(SITE_URL . 'assets/img/doc.svg')) ?>" alt="" style="width: 5%">
														<?php is($doc['file'], 'showCapital') ?>
													</h3>
												</div>

												<div class="col-md-12">
													<select class="form-control withoutTagging docCats" data-tags="true" data-placeholder="Select a Category" name="form[<?php is($doc['id'], 'show') ?>][category_id]">
														<option selected disabled>Select A Category</option>

														<?php if (is($categories)) foreach ($categories as $category) : ?>
															<option value="<?php is($category->id, 'show') ?>">
																<?php is($category->title, 'showCapital'); ?>
															</option>
														<?php endforeach; ?>
													</select>
													<input type="hidden" name="form[<?php is($doc['id'], 'show') ?>][catName]" class="catName">

													<div class="extraData" style="display: none;">
														<div class="form-group mb-4">
															<input type="text" class="form-control" name="form[<?php is($doc['id'], 'show') ?>][title]" placeholder="Title *">
															<small class="form-text text-muted">
																<span class="text-danger mr-1">*</span>
																Required Fields
															</small>
														</div>

														<div class="academic_year" style="display: none;">
															<select class="form-control withoutTagging " data-tags="true" data-placeholder="Select Academic Year" name="form[<?php is($doc['id'], 'show') ?>][academic_year]">
																<option selected disabled>Select A Academic Year</option>
																<option value="<?php echo date('Y', time()) ?>/<?php echo date('Y', strtotime('+1 year')) ?>">
																	<?php echo date('Y', time()) ?>/
																	<?php echo date('Y', strtotime('+ 1 year')) ?>
																</option>
																<?php for ($i = 0; $i < 9; $i++) : ?>
																	<?php $a = $i;
																	$b = $i + 1 ?>
																	<option value="<?php echo date('Y', strtotime('- ' . $b . ' year')) ?>/<?php echo date('Y', strtotime('- ' . $a . ' year')) ?>">
																		<?php echo date('Y', strtotime('- ' . $b . ' year')) ?>/
																		<?php echo date('Y', strtotime('- ' . $a . ' year')) ?>
																	</option>
																<?php endfor; ?>
															</select>
														</div>

														<div class="form-group mb-4">
															<div class="addition_field mb-4" style="display:none">
																<input type="text" class="form-control " name="form[<?php is($doc['id'], 'show') ?>][addition_field]">
																<small class="form-text text-muted">
																	<span class="text-danger mr-1">*</span>
																	Required Fields
																</small>
															</div>

															<div class="row summary_content mb-4" style="display:none">
																<div class="col-12">
																	<legend>Summary Content</legend>
																</div>
																<div class="col-4">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][summary_content]',
																		'book',
																		'Book',
																		'',
																		'primary book'
																	); ?>
																</div>
																<div class="col-4">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][summary_content]',
																		'entire course',
																		'Entire Course',
																		'',
																		'primary'
																	); ?>
																</div>
																<div class="col-4">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][summary_content]',
																		'other',
																		'Other',
																		'',
																		'primary'
																	); ?>
																</div>
															</div>

															<div class="book_id mb-4" style="display:none">
																<select class="form-control withoutTagging" data-tags="true" data-placeholder="Select a Book" name="form[<?php is($doc['id'], 'show') ?>][book_id]">
																	<option selected disabled>Select A Book</option>

																	<?php if (is($books)) foreach ($books as $book) : ?>
																		<option value="<?php is($book->id, 'show') ?>">
																			<?php is($book->title, 'showCapital'); ?>
																		</option>
																	<?php endforeach; ?>
																</select>
															</div>

															<div class="row exam_type mb-4" style="display:none">
																<div class="col-12">
																	<legend>Exam Type</legend>
																</div>
																<div class="col-6">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][exam_type]',
																		'exam',
																		'Exam',
																		'',
																		'primary'
																	); ?>
																</div>
																<div class="col-6">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][exam_type]',
																		'sample/practics exam',
																		'Sample/Practics Exam',
																		'',
																		'primary'
																	); ?>
																</div>
															</div>

															<div class="row exam_content mb-4" style="display:none">
																<div class="col-12">
																	<legend>Exam Content</legend>
																</div>
																<div class="col-4">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][exam_content]',
																		'questions & answers',
																		'Questions & Answers',
																		'',
																		'primary'
																	); ?>
																</div>
																<div class="col-4">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][exam_content]',
																		'questions',
																		'Questions',
																		'',
																		'primary'
																	); ?>
																</div>
																<div class="col-4">
																	<?php checkbox_input(
																		'form[' . $doc['id'] . '][exam_content]',
																		'answers',
																		'Answers',
																		'',
																		'primary'
																	); ?>
																</div>
															</div>

															<div class="exam_date" style="display: none;">
																<div class="row">
																	<div class="col-3">
																		<select name="form[<?php is($doc['id'], 'show') ?>][day]" class="custom-select">
																			<option value="" hidden>Day</option>
																			<?php for ($i = 1; $i <= 31; $i++) : ?>
																				<option value="<?php echo $i; ?>">
																					<?php echo $i; ?>
																				</option>
																			<?php endfor; ?>
																		</select>
																	</div>
																	<div class="col-3">
																		<select name="form[<?php is($doc['id'], 'show') ?>][month]" class="custom-select">
																			<option value="" hidden>Month</option>
																			<?php for ($i = 0; $i < 12; $i++) : ?>
																				<option value="<?php echo date('n', strtotime('+ ' . $i . ' month')); ?>">
																					<?php echo date('F', strtotime('+ ' . $i . ' month')); ?>
																				</option>
																			<?php endfor; ?>
																		</select>
																	</div>
																	<div class="col-3">
																		<select name="form[<?php is($doc['id'], 'show') ?>][semester]" class="custom-select">
																			<option value="" hidden>Semester</option>
																			<option value="unknown">
																				Unknown
																			</option>
																			<option value="autumn">
																				Autumn
																			</option>
																			<option value="spring">
																				Spring
																			</option>
																			<option value="summer">
																				Summer
																			</option>
																			<option value="winter">
																				Winter
																			</option>
																		</select>
																	</div>
																	<div class="col-3">
																		<select name="form[<?php is($doc['id'], 'show') ?>][year]" class="custom-select">
																			<option value="" hidden>Year</option>
																			<option value="<?php echo date('Y'); ?>">
																				<?php echo date('Y'); ?>
																			</option>
																			<?php for ($i = 1; $i <= 10; $i++) : ?>
																				<option value="<?php echo date('Y', strtotime('- ' . $i . ' year')); ?>">
																					<?php echo date('Y', strtotime('- ' . $i . ' year')); ?>
																				</option>
																			<?php endfor; ?>
																		</select>
																	</div>
																</div>

															</div>

														</div>
													</div>

													<div class="form-group mb-4">
														<textarea class="form-control" name="form[<?php is($doc['id'], 'show') ?>][desc]" placeholder="Description *"></textarea>
														<small class="form-text text-muted">
															<span class="text-danger mr-1">*</span>Required Fields
														</small>
													</div>
													<div class="mb-4">
														<?php checkbox_input(
															'form[' . $doc['id'] . '][a_upload]',
															'1',
															'Anonymous Upload ',
															'',
															'primary'
														); ?>
														<small>
															Check to make upload anonymous.
														</small>
													</div>
												</div>
											</div>
										<?php endforeach; ?>

									<?php else : ?>
										<h1>Please Upload Document First</h1>
									<?php endif; ?>
									<div class="row">
										<div class="col-6"></div>
										<div class="col-6">
											<span class="btn btn-info mb-2 float-right" id="next-3">Next</span>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="rounded-pills-icon-offer" role="tabpanel" aria-labelledby="rounded-pills-icon-offer-tab">
									<div class="row">
										<div class="col-md-12">
											<?php if (is($_SESSION['uploadedDocs'], 'array')) : ?>

												<h2 class="text-center">
													Rs. <?php echo count($_SESSION['uploadedDocs']) * 1 * 12 ?>
												</h2>
												<h4 class="text-center">
													is our offer for your documents
												</h4>
												<div class="row">
													<div class="col-6"></div>
													<div class="col-6">
														<button type="submit" name="addDocument" value="sfddsfs" class="btn btn-primary mt-4 float-right">Add Document</button>
													</div>
												</div>

											<?php else : ?>
												<h1>Please Upload Document First</h1>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	/** Log Message When Debugger is True */
	function log(msg) {
		let debug = true;
		if (typeof debug !== 'undefined' && debug !== false && debug !== '') {
			return console.log(msg);
		}
		return false;
	}

	/** Execute When Document is Loaded */
	window.addEventListener('load', () => {

		/** Clear Console for Fresh Start */
		// console.clear();

		let imageContainer = document.getElementById('imageContainer');
		let imgInput = document.getElementById('docImgInput');
		let previewContainer = document.getElementById('previewContainer');

		/** Input File Tag onChage */
		imgInput.addEventListener('change', function(e) {
			Object.keys(this.files).forEach(key => {
				send(this.files[key]);
				log(this.files[key]);
			});
		});

		/** ImageContainer onDrop */
		imageContainer.addEventListener("drop", function(event) {
			event.preventDefault();

			if (imageContainer.classList.contains('hover'))
				imageContainer.classList.remove('hover');

			if (typeof event.dataTransfer.files !== 'undefined' && event.dataTransfer.files !== '' && typeof event.dataTransfer.files === 'object') {
				Object.keys(event.dataTransfer.files).forEach(key => {
					send(event.dataTransfer.files[key]);
					log(event.dataTransfer.files[key]);
				});
			}

		}, false);

		/** Upload File */
		function send(file) {
			previewContainer.classList.contains('d-none') && previewContainer.classList.remove('d-none');
			var formdata = new FormData();

			document.getElementById('btnUpload').setAttribute('type', 'submit')
			document.getElementById('btnUpload').classList.contains('disabled') && document.getElementById('btnUpload').classList.remove('disabled');

			formdata.append('uploadDocument', 'sdfd');
			formdata.append('file', file);

			$.ajax({
				type: "POST",
				url: "<?php echo SITE_URL; ?>upload/document",
				processData: false,
				contentType: false,
				data: formdata,
				success: function(response) {
					if (typeof response !== 'undefined' && response !== '') {
						let json = JSON.parse(response)
						log(json);

						Object.keys(json).forEach(key => {
							const previewCard = document.createElement('div');
							previewCard.classList.add('previewCard')

							const previewImage = document.createElement('img');
							previewImage.classList.add('previewImage')
							if (json[key].upload_data.file_ext == '.pdf') {
								previewImage.src = '<?php echo SITE_URL ?>assets/img/pdf.svg';
							} else {
								previewImage.src = '<?php echo SITE_URL ?>assets/img/doc.svg';
							}

							const textContainer = document.createElement('div');
							textContainer.classList.add('textContainer')

							const h4 = document.createElement('h4');
							h4.append(json[key].upload_data.orig_name)

							const span = document.createElement('span');
							span.append(json[key].upload_data.file_size + ' kb')

							const input = document.createElement('input');
							input.setAttribute('type', 'hidden')
							input.setAttribute('name', 'docs[]')
							input.setAttribute('value', json[key].upload_data.file_name)

							const inputName = document.createElement('input');
							inputName.setAttribute('type', 'hidden')
							inputName.setAttribute('name', 'docsName[]')
							inputName.setAttribute('value', json[key].upload_data.orig_name)

							textContainer.appendChild(h4)
							textContainer.appendChild(span)
							previewCard.appendChild(input)
							previewCard.appendChild(inputName)
							previewCard.appendChild(previewImage)
							previewCard.appendChild(textContainer)

							previewContainer.appendChild(previewCard)
						})
					}
				},
				error: (error) => log(error)
			});
		}

		/** Preview File or Read Files  */
		function readfiles(files) {
			const reader = new FileReader;
			const type = files.type;
			reader.onload = file => {
				const previewCard = document.createElement('div');
				const iframe = document.createElement('iframe');
				iframe.src = file.target.result;
				previewContainer.appendChild(iframe);
			}
			reader.readAsDataURL(files);
		}

		/** ImageContainer onDragEnter */
		imageContainer.addEventListener('dragenter', (e) => {
			e.preventDefault();
			imageContainer.classList.add('hover');

		}, false)



		/** ImageContainer onDragOver */
		imageContainer.addEventListener('dragover', (e) => {
			e.stopPropagation();
			e.preventDefault();
			imageContainer.classList.add('hover');
		}, false)


		/** ImageContainer onDragLeave */
		imageContainer.addEventListener('dragleave', () => {

			if (imageContainer.classList.contains('hover'))
				imageContainer.classList.remove('hover');

		}, false)

	})
</script>