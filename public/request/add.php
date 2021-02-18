<?php breadcrumb_start('requests', 'list/requests', 'course_list'); ?>
<div class="row" id="cancel-row">
	<div class="offset-lg-2 offset-md-1 col-md-10 col-xl-8 col-lg-8  col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">

			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Request Subject *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="email" class="form-control" id="email" name="email" placeholder="Request Email *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
							<textarea class="form-control" id="desc" name="desc" placeholder="Request Description *"></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

				</div>

				<!-- Request Image -->
				<?php file_input('catImg'); ?>

				<button type="submit" name="addRequest" value="sfddsfs" class="btn btn-primary mt-4">Add Request</button>
			</form>
		</div>
	</div>
</div>
