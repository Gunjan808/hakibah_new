<?php breadcrumb_start('universities', 'list/universities', 'university_list'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-6 col-lg-6 col-sm-6 offset-3 layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">

			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<label for="">University Name</label>
							<input type="text" class="form-control" id="title" name="title" placeholder="University Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mb-4">
							<label for="">Country Name</label>
							<select class="selectpicker form-control" id="country-search" name="country_id" data-live-search="true" title="Select Country">
							</select>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>


				<button type="submit" name="addUniversity" value="sfddsfs" class="btn btn-primary mt-4">Add University</button>
			</form>
		</div>
	</div>
</div>