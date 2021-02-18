<?php breadcrumb_start('courses', 'list/courses', 'course_list'); ?>
<div class="row" id="cancel-row">
	<div class="col-12 layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">

			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="title" name="title" placeholder="Course Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group mb-4">
							<select class="selectpicker form-control" id="university-search" name="university_id" data-live-search="true" title=" Select University ">
								<?php /* if (is($universities, 'array'))
									foreach ($universities as $university) : ?>
									<option value="<?php echo $university->id; ?>">
										<?php echo ucwords($university->title); ?>
									</option>
								<?php endforeach; */ ?>
							</select>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>

				<button type="submit" name="addCourse" value="sfddsfs" class="btn btn-primary mt-4">Add Course</button>
			</form>
		</div>
	</div>
</div>