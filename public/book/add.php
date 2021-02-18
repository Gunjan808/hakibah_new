<?php breadcrumb_start('books', 'list/books', 'course_list'); ?>
<div class="row" id="cancel-row">
	<div class="offset-lg-2 col-xl-8 col-lg-8 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">

			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="title" name="title" placeholder="Book Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN no. *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

				</div>

				<button type="submit" name="addBook" value="sfddsfs" class="btn btn-primary mt-4">Add Book</button>
			</form>
		</div>
	</div>
</div>
