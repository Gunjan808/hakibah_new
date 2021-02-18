<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php empty($applications->type) or breadcrumb_start($applications->type, 'list/career', 'list_applications'); ?>
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">

            <div class="table-responsive mb-4 mt-4">
                <table id="multi-column-ordering" class="style-3 table table-hover" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th class="text-left">Employer Details</th>
                            <th class="text-center">job</th>
                            <th class="text-center">Experience</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Status</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        // print_r($applications);
                        if (!empty($applications)) :
                            $i = 1;
                            foreach ($applications as $key => $value) :
                                $value->status === '0' and $status = ' New ' and $class = 'info';
                                $value->status === '1' and $status = ' Hired ' and $class = 'success';
                                $value->status === '2' and $status = ' Approved ' and $class = 'dark';
                                $value->status === '3' and $status = ' Save For Later ' and $class = 'danger'; ?>
                                <tr>
                                    <td><?php echo $i++; ?>.</td>

                                    <td class="text-left pb-4">
                                        <span class="pr-3 mt-3 py-0 d-block position-relative">
                                            <p class="align-self-center pt-2 mb-0 admin-name">
                                                <?php is($value->name, 'showCapital'); ?>
                                            </p>
                                            <p class="mb-0 admin-name">
                                                <?php is($value->mobile, 'show'); ?>
                                            </p>
                                            <p class="mb-0 admin-name">
                                                <?php is($value->email, 'show'); ?>
                                            </p>
                                        </span>
                                    </td>

                                    <!-- job -->
                                    <td class="text-center">
                                        <p class="mb-0 admin-name">
                                            <?php echo get_title('jobs', $value->job_id); ?>
                                            <br>
                                            <?php is($value->category_name, 'showCapital'); ?>
                                            <br>
                                            <?php is($value->subject, 'showCapital'); ?>
                                        </p>
                                    </td>
                                    <!-- job -->

                                    <!-- experience -->
                                    <td class="text-center">
                                        <p class="mb-0 admin-name">
                                            <?php is($value->experience, 'showCapital'); ?>&nbsp;Year
                                        </p>
                                        <p class="mb-0 admin-name">
                                            <?php is($value->qualification, 'showCapital'); ?>
                                        </p>
                                    </td>
                                    <!-- experience -->
                                    <!-- message -->
                                    <td class="text-center">
                                        <p class="mb-0 admin-name">
                                            <?php is($value->message, 'showCapital'); ?>
                                        </p>
                                    </td>
                                    <!-- message -->

                                    <!-- status -->
                                    <td class="text-center">
                                        <div class="btn-group dropright mb-4 mr-2" role="group">
                                            <button id="btnDropRight" type="button" class="btn btn-<?php is($class, 'show'); ?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php $value->status != 0 and print("style='cursor: default;'"); ?>>
                                                <?php is($status, 'show'); ?>
                                                <?php if ($value->status == 0 or $value->status == 2) : ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                <?php endif; ?>
                                            </button>

                                            <?php if ($value->status == 0) : ?>
                                                <div class="dropdown-menu" aria-labelledby="btnDropRight" style="will-change: transform;">
                                                    <a href="<?= SITE_URL . 'application-change-status/approved/' . $value->id ?>" class="dropdown-item" style="color:green">Approved</a>
                                                    <a href="<?= SITE_URL . 'application-change-status/save-later/' . $value->id ?>" class="dropdown-item" style="color:red">Save For Later</a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($value->status == 2) : ?>
                                                <div class="dropdown-menu" aria-labelledby="btnDropRight" style="will-change: transform;">
                                                    <a href="<?= SITE_URL . 'application-change-status/accepted/' . $value->id ?>" class="dropdown-item" style="color:green">Hired</a>
                                                    <a href="<?= SITE_URL . 'application-change-status/reject/' . $value->id ?>" class="dropdown-item" style="color:red">Rejected</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <!-- status -->

                                    <!-- created_date -->
                                    <td class="text-center">
                                        <p class="mb-0 admin-name">
                                            <?php is($value->created_date, 'datetime'); ?>
                                        </p>
                                    </td>
                                    <!-- created_date -->

                                    <!--Action-->
                                    <td class="text-center">
                                        <ul class="table-controls">

                                            <li>
                                                <a target="_blank" href="<?php is($value->resume, 'show'); ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="View Resume">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye p-1 br-6 mb-1">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo SITE_URL . 'list/career/' . $value->id; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>

                                        </ul>
                                    </td>
                                    <!-- Action -->
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th>#</th>
                            <th class="text-left">Name</th>
                            <th class="text-center">job</th>
                            <th class="text-center">Experience</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Status</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>