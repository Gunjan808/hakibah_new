<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start('universities', 'list/universities', 'university_list'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="title" name="title" placeholder="University Title *" minlength="3" value="<?php is($universityData->title, 'showCapital'); ?>">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>

				<button type="submit" name="editUniversity" value="sfddsfs" class="btn btn-primary mt-4">Update University</button>
			</form>
		</div>
	</div>
</div>