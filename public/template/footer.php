</div>
</div>
<!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


<!-- Modal -->
<div class="modal fade" id="createCourse" aria-labelledby="createCourseLabel" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 600px">
		<div class="modal-content">
			<form action="<?php echo SITE_URL; ?>create-course" method="post">
				<div class="modal-header border-0 p-4">
					<h4 class="font-weight-bold" id="createCourseLabel">
						Add Course
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-4">
					<div class="form-group mb-0">
						<label for="myUniversitySearch">University</label>
						<select class="form-control" data-tags="true" data-placeholder="Select a University" name="university_id" id="myUniversitySearch"></select>
					</div>
					<div class="form-group">
						<label for="course_title">Course Name</label>
						<input type="text" class="form-control" id="course_title" name="title" placeholder="Your Course Name">
					</div>
					<div class="form-group">
						<label for="course_code">Course Code</label>
						<input type="text" class="form-control" id="course_code" name="course_code" placeholder="Your Course Code">
					</div>
				</div>
				<div class="modal-footer border-0 mb-0">
					<button type="submit" class="btn btn-primary" name="addCourse" value="sdfsd">Add course</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->

<script src="<?php echo SITE_URL; ?>plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo SITE_URL; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo SITE_URL; ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo SITE_URL; ?>assets/js/app.js"></script>
<script>
	$(document).ready(function() {
		App.init();
	});
</script>
<script src="<?php echo SITE_URL; ?>assets/js/custom.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->

<?php // Add Scripts For Login Page
if (check_current_page('admin/login')) : ?>
	<script src="<?php echo SITE_URL; ?>assets/js/authentication/form-1.js"></script>
<?php // Add Scripts For Main Dashboard
elseif (check_current_page('admin/home')) : ?>
	<script src="<?php echo SITE_URL; ?>plugins/apex/apexcharts.min.js"></script>
	<script src="<?php echo SITE_URL; ?>assets/js/dashboard/dash_1.js"></script>
<?php // Add Scripts For Datatable Lists
elseif (check_current_method_similar('list')) : 	?>
	<script src="<?php echo SITE_URL; ?>plugins/table/datatable/datatables.js"></script>
	<script src="<?php echo SITE_URL; ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?php echo SITE_URL; ?>plugins/select2/select2.min.js"></script>
	<script>
		$('#multi-column-ordering').DataTable({
			"oLanguage": {
				"oPaginate": {
					"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
					"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
				},
				"sInfo": "Showing page _PAGE_ of _PAGES_",
				"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
				"sSearchPlaceholder": "Search...",
				"sLengthMenu": "Results :  _MENU_",
			},
			"stripeClasses": [],
			"lengthMenu": [7, 10, 20, 50],
			"pageLength": 7,
			columnDefs: [{
				targets: [0],
				orderData: [0, 1]
			}, {
				targets: [1],
				orderData: [1, 0]
			}, {
				targets: [4],
				orderData: [4, 0]
			}]
		});
	</script>

	<script>
		$(document).ready(function() {
			$.fn.dataTable.pipeline = function(opts) {
				// Configuration options
				var conf = $.extend({
					pages: 1, // number of pages to cache
					url: '', // script url
					data: null, // function or object with parameters to send to the server
					// matching how `ajax.data` works in DataTables
					method: 'POST' // Ajax HTTP method
				}, opts);

				// Private variables for storing the cache
				var cacheLower = -1;
				var cacheUpper = null;
				var cacheLastRequest = null;
				var cacheLastJson = null;

				return function(request, drawCallback, settings) {
					var ajax = false;
					var requestStart = request.start;
					var drawStart = request.start;
					var requestLength = request.length;
					var requestEnd = requestStart + requestLength;

					if (settings.clearCache) {
						// API requested that the cache be cleared
						ajax = true;
						settings.clearCache = false;
					} else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
						// outside cached data - need to make a request
						ajax = true;
					} else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
						JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
						JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
					) {
						// properties changed (ordering, columns, searching)
						ajax = true;
					}

					// Store the request for checking next time around
					cacheLastRequest = $.extend(true, {}, request);

					if (ajax) {
						// Need data from the server
						if (requestStart < cacheLower) {
							requestStart = requestStart - (requestLength * (conf.pages - 1));

							if (requestStart < 0) {
								requestStart = 0;
							}
						}

						cacheLower = requestStart;
						cacheUpper = requestStart + (requestLength * conf.pages);

						request.start = requestStart;
						request.length = requestLength * conf.pages;

						// Provide the same `data` options as DataTables.
						if (typeof conf.data === 'function') {
							// As a function it is executed with the data object as an arg
							// for manipulation. If an object is returned, it is used as the
							// data object to submit
							var d = conf.data(request);
							if (d) {
								$.extend(request, d);
							}
						} else if ($.isPlainObject(conf.data)) {
							// As an object, the data given extends the default
							$.extend(request, conf.data);
						}

						return $.ajax({
							"type": conf.method,
							"url": conf.url,
							"data": request,
							"dataType": "json",
							"cache": false,
							"success": function(json) {
								cacheLastJson = $.extend(true, {}, json);

								if (cacheLower != drawStart) {
									json.data.splice(0, drawStart - cacheLower);
								}
								if (requestLength >= -1) {
									json.data.splice(requestLength, json.data.length);
								}

								drawCallback(json);
							}
						});
					} else {
						json = $.extend(true, {}, cacheLastJson);
						json.draw = request.draw; // Update the echo for each response
						json.data.splice(0, requestStart - cacheLower);
						json.data.splice(requestLength, json.data.length);

						drawCallback(json);
					}
				}
			};

			// Register an API method that will empty the pipelined data, forcing an Ajax
			// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
			$.fn.dataTable.Api.register('clearPipeline()', function() {
				return this.iterator('table', function(settings) {
					settings.clearCache = true;
				});
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			if ($('#universityTable').length) {
				var table = $('#universityTable').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax": $.fn.dataTable.pipeline({
						url: '<?php echo SITE_URL; ?>fetch/university-list',
						pages: 1 // number of pages to cache
					}),
					"oLanguage": {
						"oPaginate": {
							"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
							"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
						},
						"sInfo": "Showing page _PAGE_ of _PAGES_",
						"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
						"sSearchPlaceholder": "Search...",
						"sLengthMenu": "Results :  _MENU_",
					},
					"stripeClasses": [],
					"lengthMenu": [5, 10, 20, 50, 75, 100],
					"pageLength": 5,
					orderCellsTop: true,
					fixedHeader: true,
					columnDefs: [{
						targets: [0],
						orderData: [0, 1]
					}, {
						targets: [1],
						orderData: [1, 0]
					}, {
						targets: [4],
						orderData: [4, 0]
					}]
				});
			}
		});
	</script>

	<script>
		$(document).ready(function() {
			if ($('#documentTable').length) {
				$('#documentTable thead tr').clone(true).appendTo('#documentTable thead');
				$('#documentTable thead tr:eq(1) th').each(function(i) {
					console.log('i', i);
					if (i === 0) {
						$(this).html('#');
					} else if (i === 3) {
						$(this).html('Created By');
					} else if (i === 4) {
						$(this).html('Status');
					} else if (i === 5) {
						$(this).html('Created date');
					} else if (i === 6) {
						$(this).html('Action');
					} else {
						var title = $(this).text();
						$(this).html('<div class="form-group mb-1"><input type="text" class="form-control" placeholder="' + title + '" /></div>');

						$('input', this).on('keyup change', function() {
							if (table.column(i).search() !== this.value) {
								table
									.column(i)
									.search(this.value)
									.draw();
							}
						});
					}

				});
				$('#documentTable thead tr:first()').remove();

				var table = $('#documentTable').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax": $.fn.dataTable.pipeline({
						url: '<?php echo SITE_URL; ?>fetch/document-list',
						pages: 1 // number of pages to cache
					}),
					"oLanguage": {
						"oPaginate": {
							"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
							"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
						},
						"sInfo": "Showing page _PAGE_ of _PAGES_",
						"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
						"sSearchPlaceholder": "Search...",
						"sLengthMenu": "Results :  _MENU_",
					},
					"stripeClasses": [],
					"lengthMenu": [5, 10, 20, 50, 75, 100],
					"pageLength": 5,
					orderCellsTop: true,
					fixedHeader: true,
					columnDefs: [{
						targets: [0],
						orderData: [0, 1]
					}, {
						targets: [1],
						orderData: [1, 0]
					}, {
						targets: [4],
						orderData: [4, 0]
					}]
				});
			}
		});
	</script>



	<script async src="https://guteurls.de/guteurls.js" selector=".linkPreview"></script>
	<script>
		window.onload = () => {
			$('.guteurlsBox > div.guteurlsImg201610').addClass('bg-transparent');
			$('.linkPreview').addClass('w-50');
			$('.guteurlsGU').remove();
		}
	</script>

<?php // Add Scripts For Form Pages
elseif (check_current_method_similar('add') or check_current_method_similar('edit')) : ?>
	<script src="<?php echo SITE_URL; ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?php echo SITE_URL; ?>assets/js/scrollspyNav.js"></script>
	<script src="<?php echo SITE_URL; ?>plugins/flatpickr/flatpickr.js"></script>
	<script src="<?php echo SITE_URL; ?>assets/js/components/ui-accordions.js"></script>
	<script src="<?php echo SITE_URL; ?>plugins/select2/select2.min.js"></script>
	<script src="<?php echo SITE_URL; ?>plugins/editors/markdown/simplemde.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script>
		$(document).ready(() => {

			$(document).on('click', '#next-1', function() {
				//alert();
				$('#rounded-pills-icon-profile-tab').tab('show');
			});
			$(document).on('click', '#next-3', function() {
				//alert();
				$('#rounded-pills-icon-offer-tab').tab('show');
			});



			if ($('#documentAddForm').length) {

				$('.docCats').on('change', function(e) {
					$(this).parent().find('.extraData').show();

					$(this).parent().find('.addition_field').hide();
					$(this).parent().find('.academic_year').hide();
					$(this).parent().find('.academic_year').hide();
					$(this).parent().find('.exam_type').hide();
					$(this).parent().find('.exam_content').hide();
					$(this).parent().find('.exam_date').hide();
					$(this).parent().find('.summary_content').hide();

					$(this).parent().find('.catName').val($.trim($(this).find('option:selected').text()));
					console.log($(this).find('option:selected').text());
					if ($(this).find('option:selected').text().indexOf('Lecture Notes') != '-1') {
						$(this).parent().find('.addition_field').show();
						$(this).parent().find('.addition_field').find('input[type=text]').attr('placeholder', 'Lacture: eg. 1, 3-7, 10');
						$(this).parent().find('.academic_year').show();
					} else if ($(this).find('option:selected').text().indexOf('Tutorial Work') != '-1') {
						$(this).parent().find('.addition_field').show();
						$(this).parent().find('.addition_field').find('input[type=text]').attr('placeholder', 'Tutorial Work: eg. Week 1-5 & 7');
						$(this).parent().find('.academic_year').show();
					} else if ($(this).find('option:selected').text().indexOf('Essays') != '-1') {
						$(this).parent().find('.addition_field').show();
						$(this).parent().find('.addition_field').find('input[type=text]').attr('placeholder', 'Grade: eg. 7,5 & B+');
						$(this).parent().find('.academic_year').show();
					} else if ($(this).find('option:selected').text().indexOf('Past Exams') != '-1') {
						$(this).parent().find('.exam_type').show();
						$(this).parent().find('.exam_content').show();
						$(this).parent().find('.exam_date').show();
					} else if ($(this).find('option:selected').text().indexOf('Summaries') != '-1') {
						$(this).parent().find('.academic_year').show();
						$(this).parent().find('.summary_content').show();
					} else if ($(this).find('option:selected').text().indexOf('Practicals') != '-1' ||
						$(this).find('option:selected').text().indexOf('Assignments') != '-1' ||
						$(this).find('option:selected').text().indexOf('Other') != '-1') {
						$(this).parent().find('.academic_year').show();
					}
				})

				$('.book').change(function(e) {
					if ($(this).find('input:checkbox').prop("checked") == true) {
						$('.book_id').show();
					} else {
						$('.book_id').hide()
					}
				})

				// $("#course_id").on('select2:open', (e) => {
				// 	e.preventDefault()
				// 	$('.select2-results').append('<h2>hello</h2>');
				// })

				// $("#course_id").on('select2:closing', (e) => {
				// 	$('.select2-results').find('h2').remove();
				// })
			}
		});
	</script>

	<script>
		//Init CKeditor
		if ($('#editor1').length) {
			CKEDITOR.replace('editor1');
		}

		if ($('.tagging').length || $('.withoutTagging').length) {
			$(".tagging").select2({
				tags: true,
				placeholder: "Make a Selection"
			});
			$(".withoutTagging").select2({
				placeholder: "Make a Selection"
			});
		}

		// Property Add Show Hide Possession Date
		if ($('#pdate').length) {
			$('#rtmo').click(function(e) {
				$('#pdate').slideUp();
			});
			$('#uc').click(function(e) {
				$('#pdate').slideDown();
			});
		}

		// Add FlatPickr on FollowDate
		if ($('#myFlatDate').length) {
			var f2 = flatpickr(document.querySelector('#myFlatDate'), {
				enableTime: true,
				dateFormat: "Y-m-d H:i:s",
			});
		}

		new SimpleMDE({
			element: document.getElementById("cpt_add_ta1"),
			spellChecker: false,
			autosave: {
				enabled: true,
				unique_id: "cpt_add_ta1",
			},
		});
	</script>
<?php endif; ?>
<script>
	$(document).ready(function() {
		$(document).on('click', '.course_price', function() {
			// alert($(this).val());
			if ($(this).val() == 'show_price') {
				$('.r_price').show();
				$('.s_price').show();
			} else {
				$('.r_price').hide();
				$('.s_price').hide();
			}
		});

		$("#country-search").select2({
			ajax: {
				url: "<?= SITE_URL . 'index.php/AjaxController/get_country_name' ?>",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data, params) {
					return {
						results: data
					};
				},
				cache: true
			},
			placeholder: 'Search for a country',
			minimumInputLength: 2
		});


		$("#university-search").select2({
			ajax: {
				url: "<?= SITE_URL . 'index.php/AjaxController/get_university_name' ?>",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data, params) {
					return {
						results: data
					};
				},
				cache: true
			},
			placeholder: 'Search for a university',
			minimumInputLength: 2
		});


		$(" #myUniversitySearch").select2({
			ajax: {
				url: "<?= SITE_URL . 'index.php/AjaxController/get_university_name' ?>",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data, params) {
					return {
						results: data
					};
				},
				cache: true
			},
			dropdownParent: $("#createCourse"),
			placeholder: 'Search for a university',
			minimumInputLength: 2
		});

		$('#uploadCourse').select2({
			ajax: {
				url: "<?php echo SITE_URL; ?>fetch/selected-course",
				type: 'POST',
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term,
						university_id: $('#university-search').val()
					};
				},
				processResults: function(data, params) {
					return {
						results: data
					};
				},
				cache: true
			},
			placeholder: 'Search for a Course',
			minimumInputLength: 2
		}).on('select2:open', () => {
			$(".select2-results:not(:has(a))").append('<li class="select2-results__option select2-results__message" ><a class="text-decoration-none" href="#" data-toggle="modal" data-target="#createCourse">Did we miss a course? Add it yourself!</a></li>');
		})


		$("#course-search").select2({
			ajax: {
				url: "<?= SITE_URL . 'index.php/AjaxController/get_course_name' ?>",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data, params) {
					return {
						results: data
					};
				},
				cache: true
			},
			placeholder: 'Search for a Course',
			minimumInputLength: 2
		});

	});
</script>
</body>

</html>