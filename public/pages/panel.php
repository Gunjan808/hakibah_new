<style>
    .menuBg-color-dash a.menuLink {
        width: 100%;
        float: left;
        display: flex;
        align-items: center;
        border: 0;
        border-radius: 6px;
        background-color: #b6e0c7;
        cursor: pointer;
        padding: 12px 18px;
        width: 100%;
        text-align: left;
        color: #343a40;
    }
    .menuBg-color a.menuLink:hover{
        width: 100%;
        float: left;
        display: flex;
        align-items: center;
        border: 0;
        border-radius: 6px;
        background-color: #b6e0c7;
        cursor: pointer;
        padding: 12px 18px;
        width: 100%;
        text-align: left;
        color: #343a40;
    }
    .menuBg-color a.menuLink span{
        padding-left: 0px !important;
    }
    .card-header{
        border-bottom: 0;
        padding-left: 18px;
    }
    .menuBg-color a.menuLink:hover .card-header{
        padding: 0;
        width: 100%;
        border-bottom: 0;
        background: transparent;
    }
    
    #sidebarStart{display: none;}
    
    @media (max-width: 767px){
        #sidebarStart{display: block;}
    }
</style>


<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-light" style="max-width: 285px;">
                <div class="d-none d-md-block">
                    <div class="d-flex p-3 py-4" style="flex-direction: row; align-items: center;">
                        <div class="rounded-circle bg-warning p-1 text-center" style="width: 35px; height:35px">
                            <?php is($_SESSION['USER_NAME']) and print(substr($_SESSION['USER_NAME'], 0, 1)) ?>
                        </div>

                        <h5 class="mb-0 ml-3">
                            <a href="<?php echo SITE_URL ?>/profile"><?php is($_SESSION['USER_NAME'], 'showCapital'); ?></a>
                        </h5>
                    </div>

                    <div class="px-2 p-2 d-inline-flex w-100 menuBg-color-dash">
                       <a href="#" style="width: 100%;float: left; padding: 12px 18px; background:#b6e0c7; color:#000000" class="menuLink" >
                            <div style="display: inline-block;" style="background:#b6e0c7">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </div>
                            <span class="ml-3" style="padding-left:0;">Dashboard</span>
                       </a>
                    </div>

                    <div class="p-2 pt-4 pb-2">
                        <span class="font-weight-bold text-secondary mb-3">
                            My Library
                        </span>

                        <div class="accordion mt-3 menuBg-color" id="accordionExample">
                            <div class="card border-0">
							<a href="#" style="color:#000000" class="menuLink">
                                <div class="card-header" id="headingOne">
                                    <span class="text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex text-primary" style="align-items: center; justify-self: space-between;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder">
                                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                            </svg>
                                            <span class="ml-3 text-dark">Courses</span>
                                            <div class="ml-auto mr-0 text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </span>
                                </div>
						</a>
                                <div id="collapseOne" class="bg-light collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <?php if (is($data['my_courses'])) : ?>
                                                <?php foreach ($data['my_courses'] as $course) : ?>
                                                    <li class="media my-1 py-1">
                                                        <div class="media-body pt-1">
                                                            <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>course/<?php is($course->university_slug, 'show') ?>/<?php is($course->slug, 'show') ?>">
                                                                <?php is($course->title, 'showCapital'); ?>
                                                                <span class="ml-1 text-secondary">
                                                                    <?php is($course->course_code, 'show'); ?>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <li>
                                                    You don't have any courses yet.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
							<a href="#" style="color:#000000" class="menuLink">
                                <div class="card-header" id="headingTwo">
                                    <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                            </svg>
                                            <span class="ml-3 text-dark">Books</span>
                                            <div class="ml-auto mr-0 text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </span>
                                </div>
								
								</a>
                                <div id="collapseTwo" class="bg-light collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <?php if (is($data['my_books'])) : foreach ($data['my_books'] as $book) : ?>
                                                    <li class="media my-1 py-1">
                                                        <div class="media-body pt-1">
                                                            <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>book/<?php is($book->university_slug, 'show') ?>/<?php is($book->slug, 'show') ?>">
                                                                <?php is($book->title, 'showCapital'); ?>
                                                                <span class="ml-1 text-secondary">
                                                                    <?php is($book->course_code, 'show'); ?>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <li>
                                                    You don't have any books yet.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
							<a href="#" style="color:#000000" class="menuLink">
                                <div class="card-header" id="headingTwo">
                                    <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <div class="d-flex text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                            </svg>
                                            <span class="ml-3 text-dark">Studylists</span>
                                            <div class="ml-auto mr-0 text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </span>
                                </div>
								</a>
                                <div id="collapseFive" class="bg-light collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <?php if (is($data['studyLists'])) : foreach ($data['studyLists'] as $studylist) : ?>
                                                    <li class="media my-1 py-1">
                                                        <div class="media-body pt-1">
                                                            <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>studylist/<?php is($studylist->id, 'show') ?>">
                                                                <?php is($studylist->title, 'showCapital'); ?>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <li>
                                                    You don't have any studylists yet.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card border-0">
							<a href="#" style="color:#000000" class="menuLink">
                                <div class="card-header" id="headingThree">
                                    <span class="text-dark collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="d-flex text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                            <span class="ml-3 text-dark">Recent Documents</span>
                                            <div class="ml-auto mr-0 text-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </span>
                                </div>
								</a>
                                <div id="collapseThree" class="bg-light collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <?php if (is($data['recent_docs'])) : foreach ($data['recent_docs'] as $doc) : ?>
                                                    <li class="media my-1 py-1">
                                                        <div class="media-body pt-1">
                                                            <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                                <?php is($doc->title, 'showCapital'); ?>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <li>
                                                    You don't have any Documents yet.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
							
							
							
							
							
							
							
							
							
							
							
							
							
							<div class="card border-0">
						        <a href="<?php echo SITE_URL; ?>likedlist/<?php echo $_SESSION['USER_ID'] ?>" style="color:#000000" class="menuLink">
                                    <div class="card-header" id="headingThree">
                                        <span class="text-dark collapsed" data-toggle="collapse" data-target="" aria-expanded="false" aria-controls="collapseThree">
                                            <div class="d-flex text-primary">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
    										   <path d="M15.43 8.814c.808-3.283 1.252-8.814-2.197-8.814-1.861 0-2.35 1.668-2.833 3.329-1.971 6.788-5.314 7.342-8.4 7.743v9.928c3.503 0 5.584.729 8.169 1.842 1.257.541 3.053 1.158 5.336 1.158 2.538 0 4.295-.997 5.009-3.686.5-1.877 1.486-7.25 1.486-8.25 0-1.649-1.168-2.446-2.594-2.507-1.21-.051-2.87-.277-3.976-.743zm3.718 4.321l-1.394.167s-.609 1.109.141 1.115c0 0 .201.01 1.069-.027 1.082-.046 1.051 1.469.004 1.563l-1.761.099c-.734.094-.656 1.203.141 1.172 0 0 .686-.017 1.143-.041 1.068-.056 1.016 1.429.04 1.551-.424.053-1.745.115-1.745.115-.811.072-.706 1.235.109 1.141l.771-.031c.822-.074 1.003.825-.292 1.661-1.567.881-4.685.131-6.416-.614-2.238-.965-4.437-1.934-6.958-2.006v-6c3.263-.749 6.329-2.254 8.321-9.113.898-3.092 1.679-1.931 1.679.574 0 2.071-.49 3.786-.921 5.533 1.061.543 3.371 1.402 6.12 1.556 1.055.059 1.025 1.455-.051 1.585z"/>
    										   </svg>
                                                    
                                                </svg>
                                                <span class="ml-3 text-dark">Liked List</span>
                                               
                                            </div>
                                        </span>
                                    </div>
							    </a>
                                
                            </div>
							
							
							
							
							
							
							
                        </div>
                    </div>



                    <div class="p-1 px-3 pl-4 rounded">
                   <span class="text-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"  width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
						   <path d="M11.492 10.172l-2.5 3.064-.737-.677 3.737-4.559 3.753 4.585-.753.665-2.5-3.076v7.826h-1v-7.828zm7.008 9.828h-13c-2.481 0-4.5-2.018-4.5-4.5 0-2.178 1.555-4.038 3.698-4.424l.779-.14.043-.789c.185-3.448 3.031-6.147 6.48-6.147 3.449 0 6.295 2.699 6.478 6.147l.044.789.78.14c2.142.386 3.698 2.246 3.698 4.424 0 2.482-2.019 4.5-4.5 4.5m.978-9.908c-.212-3.951-3.472-7.092-7.478-7.092s-7.267 3.141-7.479 7.092c-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.522-5.408"/></svg>
						   </span>
						    <a class="d-inline-flex text-decoration-none" href="<?php echo SITE_URL; ?>user/uploads" > 	
                            <span class="ml-3 text-dark">Uploads</span>
                        </a>
                    </div>
                </div>
            </div>
			
			
			
			
			
			
            <div class="col">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="mt-3" action="<?php echo SITE_URL; ?>search" method="get">
                                <div class="d-inline-flex bg-white align-items-center rounded shadow-sm mt-1 py-1 border position-relative" style="width: 100%;" id="myPanelSearch">
                                    <div class="p-3 text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </div>
                                    <div class="form-group mb-0 w-100">
                                        <input type="text" name="query" id="search" class="form-control border-0 rounded-0 shadow-none" placeholder="Search for courses, books or documents">
                                    </div>
                                    <div class="py-1 px-3">
                                        <button class="btn btn-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12 py-4">
                            <h5>My Courses and Books
                                <svg style="cursor:pointer;" width="20" height="15" data-toggle="modal" data-target="#myModal" viewBox="0 0 428 428" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M214 428C332.189 428 428 332.189 428 214C428 95.8111 332.189 0 214 0C95.8111 0 0 95.8111 0 214C0 332.189 95.8111 428 214 428Z" fill="#219EBC" />
                                    <path d="M189.492 164.305H236.367L243.008 361.375H182.852L189.492 164.305ZM212.93 133.445C203.424 133.445 195.807 130.646 190.078 125.047C184.219 119.448 181.289 112.286 181.289 103.562C181.289 94.969 184.219 87.872 190.078 82.273C195.807 76.674 203.424 73.875 212.93 73.875C222.305 73.875 229.922 76.674 235.781 82.273C241.51 87.872 244.375 94.969 244.375 103.562C244.375 112.156 241.51 119.253 235.781 124.852C229.922 130.581 222.305 133.445 212.93 133.445Z" fill="white" />
                                </svg>
                            </h5>
                            <hr class="border-bottom">
<ul class="list-unstyled">
                                <?php if (is($data['my_books'])) foreach ($data['my_books'] as $book) : ?>
                                    <li class="media border-bottom my-1 py-3">
                                        <div class="mr-3">
                                            <svg class="ic ic-course ic-course--small" width="25" height="24" viewBox="0 0 16 12">
                                                <g fill="none" fill-rule="evenodd">
                                                    <path fill=" #91bbd7" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                    <rect width="16" height="11" y="1" fill=" #91bbd7" rx="2"></rect>
                                                    <rect width="16" height="10" y="2" fill="#569eba" rx="1"></rect>
                                                    <rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
                                                    <rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="media-body pt-1">
                                            <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>book/<?php is($book->slug, 'show') ?>">
                                                <?php is($book->title, 'showCapital'); ?> (Book)
                                                <!-- <span class="ml-1 text-secondary">
                                                    <?php //is($book->course_code, 'show'); ?>
                                                </span> -->
                                            </a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="list-unstyled">
                                <?php if (is($data['my_courses'])) foreach ($data['my_courses'] as $course) : ?>
                                    <li class="media border-bottom my-1 py-3">
                                        <div class="mr-3">
                                            <svg class="ic ic-course ic-course--small" width="25" height="24" viewBox="0 0 16 12">
                                                <g fill="none" fill-rule="evenodd">
                                                    <path fill=" #91bbd7" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                    <rect width="16" height="11" y="1" fill=" #91bbd7" rx="2"></rect>
                                                    <rect width="16" height="10" y="2" fill="#569eba" rx="1"></rect>
                                                    <rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
                                                    <rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="media-body pt-1">
                                            <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>course/<?php is($course->university_slug, 'show') ?>/<?php is($course->slug, 'show') ?>">
                                                <?php is($course->title, 'showCapital'); ?>
                                                <span class="ml-1 text-secondary">
                                                    <?php is($course->course_code, 'show'); ?> 
                                                </span>
                                                (Course)
                                            </a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="my-1">
                                <div class="p-2 border d-inline" style="cursor: pointer;" id="searchPlaceholderTrigger">
                                    <strong>+</strong> <span class="text-secondary ml-1">Add courses and books</span>
                                </div>
                            </div>
                        </div>

                        <?php if (is($data['studyLists'])) : ?>
                            <div class="col-md-12 py-4">
                                <h5>My Study List
                                <svg style="cursor:pointer;" width="20" height="15" data-toggle="modal" data-target="#myModal3" viewBox="0 0 428 428" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M214 428C332.189 428 428 332.189 428 214C428 95.8111 332.189 0 214 0C95.8111 0 0 95.8111 0 214C0 332.189 95.8111 428 214 428Z" fill="#219EBC" />
                                    <path d="M189.492 164.305H236.367L243.008 361.375H182.852L189.492 164.305ZM212.93 133.445C203.424 133.445 195.807 130.646 190.078 125.047C184.219 119.448 181.289 112.286 181.289 103.562C181.289 94.969 184.219 87.872 190.078 82.273C195.807 76.674 203.424 73.875 212.93 73.875C222.305 73.875 229.922 76.674 235.781 82.273C241.51 87.872 244.375 94.969 244.375 103.562C244.375 112.156 241.51 119.253 235.781 124.852C229.922 130.581 222.305 133.445 212.93 133.445Z" fill="white" />
                                </svg>

                            </h5>
                                <hr class="border-bottom">

                                <ul class="list-unstyled">
                                    <?php foreach ($data['studyLists'] as $studylist) : ?>
                                        <li class="media border-bottom my-1 py-3">
                                            <div class="mr-3">
                                                <svg height="22" viewBox="0 0 56 42">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path fill="#D35D3D" fill-rule="nonzero" d="M6.69445239,8.70830503 C7.15899767,8.23610168 7.853442,8 8.77778539,8 L53.2222227,8 C54.1481484,8 54.8425928,8.23610168 55.3055557,8.70830503 C55.7685186,9.18050838 56,9.8888134 56,10.8332201 L53.7777781,36.3322011 C53.5389935,38.1908463 52.8940743,39.6074564 51.8430204,40.5820312 C50.7919665,41.5566061 49.399849,42.0288094 47.666668,41.9986413 L29.6755434,41.9986413 L6.00000806,27.8325407 L6.00000806,10.8332201 C5.99842567,9.8888134 6.22990711,9.18050838 6.69445239,8.70830503 Z"></path>
                                                        <path fill="#15689E" fill-rule="nonzero" d="M17.7083335,0.692307692 C18.1808043,0.230769231 18.8891376,0 19.8333335,0 L48.1666667,0 C49.1111111,3.44519285e-13 49.8194445,0.230769231 50.2916667,0.692307692 C50.7638889,1.15384615 51,1.84615385 51,2.76923077 L51,36 L17,36 L17.0000002,2.76923077 C16.9997517,1.84615385 17.2358628,1.15384615 17.7083335,0.692307692 Z"></path>
                                                        <path fill="#0088D7" fill-rule="nonzero" d="M11.7086594,5.71428571 C12.1811255,5.23809524 12.8894519,5 13.8336386,5 L42.1666944,5 C43.1111296,5 43.819456,5.23809524 44.2916736,5.71428571 C44.7638912,6.19047619 45,6.9047619 45,7.85714286 L45,25 L11,25 L11.000333,7.85714286 C11.0000845,6.9047619 11.2361933,6.19047619 11.7086594,5.71428571 Z"></path>
                                                        <path fill="#FFF" fill-rule="nonzero" d="M16.4166667 10L30.5833333 10C31.5277778 10 32 10.5 32 11.5 32 12.5 31.5277778 13 30.5833333 13L16.4166667 13C15.4722222 13 15 12.5 15 11.5 15 10.5 15.4722222 10 16.4166667 10zM17.8333333 15L36.1666667 15C37.3888889 15 38 15.5 38 16.5 38 17.5 37.3888889 18 36.1666667 18L17.8333333 18C16.6111111 18 16 17.5 16 16.5 16 15.5 16.6111111 15 17.8333333 15z" opacity=".503"></path>
                                                        <path fill="#FF9676" fill-rule="nonzero" d="M2.78947368,39.2012641 C2.8860567,39.9344427 3.18459415,40.5465209 3.68508604,41.0374987 C4.18557793,41.5284765 4.81686504,41.8464241 5.57894737,41.9913414 L50.2105263,42 C51.1403509,41.95104 51.8377193,41.6245208 52.3026316,41.0204424 C52.7675439,40.416364 53,39.8099713 53,39.2012641 L50.2105263,22.4116887 C49.9288071,21.4634563 49.6033685,20.8094712 49.2342105,20.4497333 C48.6804735,19.9101266 48.0588123,19.6101126 47.4210526,19.6101126 C47.0063762,19.6101126 38.1513343,19.6101126 20.8559272,19.6101126 C20.4181314,19.6101126 19.918245,19.4079883 19.6657895,19.2034954 C19.4133339,18.9990025 19.2768112,18.7250678 19.1542985,18.3243252 C18.2729609,15.4414417 17.7370959,14 16.7421016,14 C16.0787721,14 11.4278962,14 2.78947368,14 C1.85838876,14.0084565 1.16144992,14.2458981 0.698657152,14.7123247 C0.235864387,15.1787513 0.0029786696,15.8784353 0,16.8113766 L2.78947368,39.2012641 Z"></path>
                                                        <path fill="#FFF" d="M33.3525987,29.8620324 L20.1564635,36.6859032 C19.8484212,36.8430926 19.6,36.7043961 19.6,36.3807708 L19.6,22.770015 C19.6,22.4463897 19.8484212,22.3076931 20.1564635,22.4648826 L33.3525987,29.2887533 C33.660641,29.4459428 33.660641,29.704843 33.3525987,29.8620324 Z" transform="rotate(-7 26.592 29.575)"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="media-body pt-1">
                                                <a class="mt-0 mb-1 text-dark text-decoration-none" href="<?php echo SITE_URL; ?>studylist/<?php is($studylist->id, 'show') ?>">
                                                    <?php is($studylist->title, 'showCapital'); ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>


                        <?php if (is($data) and is($data['recent_docs'], 'array')) : ?>
                            <div class="col-md-12 my-1">
                                <h5>My Recent Documents
                                <svg style="cursor:pointer;" width="20" height="15" data-toggle="modal" data-target="#myModal2" viewBox="0 0 428 428" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M214 428C332.189 428 428 332.189 428 214C428 95.8111 332.189 0 214 0C95.8111 0 0 95.8111 0 214C0 332.189 95.8111 428 214 428Z" fill="#219EBC" />
                                    <path d="M189.492 164.305H236.367L243.008 361.375H182.852L189.492 164.305ZM212.93 133.445C203.424 133.445 195.807 130.646 190.078 125.047C184.219 119.448 181.289 112.286 181.289 103.562C181.289 94.969 184.219 87.872 190.078 82.273C195.807 76.674 203.424 73.875 212.93 73.875C222.305 73.875 229.922 76.674 235.781 82.273C241.51 87.872 244.375 94.969 244.375 103.562C244.375 112.156 241.51 119.253 235.781 124.852C229.922 130.581 222.305 133.445 212.93 133.445Z" fill="white" />
                                </svg>

                            </h5>
                                <div class="row">
                                    <?php foreach ($data['recent_docs'] as $doc) : ?>
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                            <div class="card shadow">
                                                <div class="card-body p-0 rounded-lg">
                                                    <div class="text-center p-2" style="background:#E9E9E9; height: 120px; overflow: hidden;">
                                                        <?php if (!empty($doc->image)) : ?>
                                                            <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                                <img class="img-fluid rounded-lg" src="<?php is($doc->image, 'show') ?>" alt="<?php is($doc->title, 'show'); ?>">
                                                            </a>
                                                        <?php else : ?>
                                                            <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                                <img class="img-fluid rounded-lg" style="hight:100px;width:100px" src="<?php echo SITE_URL ?>uploads/image/default_image.png" alt="<?php is($doc->title, 'show'); ?>">
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="d-inline-flex align-items-center px-3 py-3" >
                                                        <svg class="ic ic-document" width="18" height="18" viewBox="0 0 66 84">
                                                            <defs>
                                                                <linearGradient x1="7.72138756%" y1="26.8474028%" x2="49.6088576%" y2="99.2035081%">
                                                                    <stop stop-color="#01d773" stop-opacity="0.325294384" offset="0%"></stop>
                                                                    <stop stop-color="#00c563" offset="100%"></stop>
                                                                </linearGradient>
                                                                <filter x="0.0%" y="0.0%" width="100.0%" height="100.0%" filterUnits="objectBoundingBox">
                                                                    <feGaussianBlur stdDeviation="0" in="SourceGraphic"></feGaussianBlur>
                                                                </filter>
                                                            </defs>
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                                <g>
                                                                    <path d="M3,0 L48,0 L66,18 L66,81 C66,82.6568542 64.6568542,84 63,84 L3,84 C1.34314575,84 2.02906125e-16,82.6568542 0,81 L0,3 C-2.02906125e-16,1.34314575 1.34314575,3.04359188e-16 3,0 Z" fill="#12d66d"></path>
                                                                    <g transform="translate(11.000000, 29.000000)" fill="#FFFFFF">
                                                                        <rect x="0" y="0" width="25" height="3" rx="1.5"></rect>
                                                                        <rect x="0" y="11" width="44" height="3" rx="1.5"></rect>
                                                                        <rect x="0" y="22" width="44" height="3" rx="1.5"></rect>
                                                                    </g>
                                                                    <g transform="translate(48.000000, 0.000000)">
                                                                        <path d="M-4.54747351e-13,0 L18,18 L4,18 C1.790861,18 -4.54476809e-13,16.209139 -4.54747351e-13,14 L-4.54747351e-13,0 Z" fill="#b7f2d6"></path>
                                                                        <polygon fill="url(#linearGradient-1)" filter="url(#filter-2)" transform="translate(11.000000, 24.000000) scale(-1, -1) translate(-11.000000, -24.000000) " points="4 18 18 30 4 30"></polygon>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <a class="text-dark" href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                            <h6 class="mb-0 ml-3" style="width: 90px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                <?php is($doc->title, 'showCapital'); ?>
                                                            </h6>
                                                        </a>
                                                    </div>
                                                    <div class="d-inline-flex align-items-center px-3 ">
                                                        <p><?php echo _time_ago($doc->created_date); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (is($data) and is($data['recent_docs'], 'array')) : ?>
                            <div class="col-md-12 my-1">
                                <h5>Recommendations
                                <svg style="cursor:pointer;" width="20" height="15" data-toggle="modal" data-target="#myModal1" viewBox="0 0 428 428" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M214 428C332.189 428 428 332.189 428 214C428 95.8111 332.189 0 214 0C95.8111 0 0 95.8111 0 214C0 332.189 95.8111 428 214 428Z" fill="#219EBC" />
                                    <path d="M189.492 164.305H236.367L243.008 361.375H182.852L189.492 164.305ZM212.93 133.445C203.424 133.445 195.807 130.646 190.078 125.047C184.219 119.448 181.289 112.286 181.289 103.562C181.289 94.969 184.219 87.872 190.078 82.273C195.807 76.674 203.424 73.875 212.93 73.875C222.305 73.875 229.922 76.674 235.781 82.273C241.51 87.872 244.375 94.969 244.375 103.562C244.375 112.156 241.51 119.253 235.781 124.852C229.922 130.581 222.305 133.445 212.93 133.445Z" fill="white" />
                                </svg>

                            </h5>
                                <div class="row">
                                    <?php foreach ($data['rec_docs'] as $doc) : ?>
                                        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                            <div class="card shadow">
                                                <div class="card-body p-0 rounded-lg">
                                                    <div class="text-center" style="background: #DDDDDD; height: 120px; overflow: hidden;">
                                                        <?php if (!empty($doc->image)) : ?>
                                                            <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                                <img class="img-fluid rounded-lg" src="<?php is($doc->image, 'show') ?>" alt="<?php is($doc->title, 'show'); ?>">
                                                            </a>
															
                                                        <?php else : ?>
                                                            <a href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
															
                              <img class="img-fluid rounded-lg" style="height:100px;width:100px" src="<?php echo SITE_URL ?>uploads/image/default_image.png" alt="<?php is($doc->title, 'show'); ?>">
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="d-inline-flex align-items-center px-3 py-3">
                                                        <svg class="ic ic-document" width="18" height="18" viewBox="0 0 66 84">
                                                            <defs>
                                                                <linearGradient x1="7.72138756%" y1="26.8474028%" x2="49.6088576%" y2="99.2035081%">
                                                                    <stop stop-color="#01d773" stop-opacity="0.325294384" offset="0%"></stop>
                                                                    <stop stop-color="#00c563" offset="100%"></stop>
                                                                </linearGradient>
                                                                <filter x="0.0%" y="0.0%" width="100.0%" height="100.0%" filterUnits="objectBoundingBox">
                                                                    <feGaussianBlur stdDeviation="0" in="SourceGraphic"></feGaussianBlur>
                                                                </filter>
                                                            </defs>
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <g>
                                                                    <path d="M3,0 L48,0 L66,18 L66,81 C66,82.6568542 64.6568542,84 63,84 L3,84 C1.34314575,84 2.02906125e-16,82.6568542 0,81 L0,3 C-2.02906125e-16,1.34314575 1.34314575,3.04359188e-16 3,0 Z" fill="#12d66d"></path>
                                                                    <g transform="translate(11.000000, 29.000000)" fill="#FFFFFF">
                                                                        <rect x="0" y="0" width="25" height="3" rx="1.5"></rect>
                                                                        <rect x="0" y="11" width="44" height="3" rx="1.5"></rect>
                                                                        <rect x="0" y="22" width="44" height="3" rx="1.5"></rect>
                                                                    </g>
                                                                    <g transform="translate(48.000000, 0.000000)">
                                                                        <path d="M-4.54747351e-13,0 L18,18 L4,18 C1.790861,18 -4.54476809e-13,16.209139 -4.54747351e-13,14 L-4.54747351e-13,0 Z" fill="#b7f2d6"></path>
                                                                        <polygon fill="url(#linearGradient-1)" filter="url(#filter-2)" transform="translate(11.000000, 24.000000) scale(-1, -1) translate(-11.000000, -24.000000) " points="4 18 18 30 4 30"></polygon>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <a class="text-dark" href="<?php echo SITE_URL; ?>document/<?php is($doc->slug, 'show') ?>/<?php is($doc->id, 'show') ?>">
                                                            <h6 class="mb-0 ml-3" style="width: 90px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                                <?php is($doc->title, 'showCapital'); ?>
                                                            </h6>
                                                        </a>
                                                    </div>
                                                    <div class="d-inline-flex align-items-center px-3 ">
                                                        <p><?php echo _time_ago($doc->created_date); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <div class="header--2XudS"><span class="extra-big--2kehQ bold--2SuGd">
                        <h4>My Courses and Books</h4>
                    </span></div>
                <div class="body--JWHiD">
                    <p class="">You can follow courses and books to easily find them and always be aware of new documents and activities in the group.</p>
                    <p class="bold--2SuGd">How it works:</p>
                    <p class="bold--2SuGd"><b>1. Find and view a course or a book</b></p>
                    <p class="">When you visit a Course or a Book you can add it or remove it from your library by clicking the add/remove button on the top of the page.</p>
                    <p class="bold--2SuGd"><b>2. Add the course or book to your library</b></p>
                    <div class="button-wrapper--1gqz6"><button type="button" class="btn btn-success">Add to My Courses</button>
                        <br><br>
                    </div><span class="bold--2SuGd"><b>3. See your library resources on the dashboard</b></span>
                    <p class="">All the courses and books you have in your library can be found on your dashboard.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Got It!</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <div class="header--2XudS"><span class="extra-big--2kehQ bold--2SuGd">
                        <h4>Recommendations</h4>
                    </span></div>
                <p>
                    When you read, rate, save and download documents, we learn what kind of documents we can suggest to you.</p>

                <b>How it works:</b>

                <p>The more you use StuDocu, the more we get to know the best documents for you to study. You will find recommended documents on your dashboard.
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Got It!</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <div class="header--2XudS"><span class="extra-big--2kehQ bold--2SuGd">
                        <h4>My recent documents</h4>
                    </span></div>
                <p>
                    Every time you view a document it will appear under your recent documents, so you can easily find the things you read recently.</p>

                <b>How it works:</b>

                <p>When you view a document you’ll find it on your dashboard
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Got It!</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <div class="header--2XudS"><span class="extra-big--2kehQ bold--2SuGd">
                        <h4>My Studylists </h4>
                    </span></div>
                <p>
                    You can save and organize documents you like into Studylists to read them later. You can have as many Studylists as you like.</p>

                <b>How it works:</b><br>
                <b>1. View a document</b>
                <p>When you view a document, you can add it to a Studylist or create a new one by clicking on the save button on the top right corner.</p>
                <b>2. Save a document in one of your Studylists</b><br>
                <svg width="100" height="100" viewBox="0 0 427 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="426" height="191" stroke="#909090" />
                    <path d="M143.166 60.3058C141.372 58.8659 138.938 58.054 136.398 58.048H95.6009V58C93.0568 58.0036 90.6182 58.8157 88.8213 60.2577C87.023 61.694 86.009 63.6427 86.0015 65.6763V134.312C85.9631 135.993 86.645 137.634 87.9334 138.962C89.7417 140.822 92.8738 141.493 95.6009 140.604C98.0001 139.762 99.989 138.315 101.265 136.483L116 117.672L130.735 136.483C132.01 138.315 133.999 139.762 136.398 140.604C139.135 141.504 142.286 140.832 144.102 138.962C145.377 137.63 146.046 135.989 145.998 134.312V65.6763C145.971 63.6578 144.954 61.7289 143.166 60.3058ZM140.238 136.521C140.002 136.77 139.675 136.955 139.302 137.05C138.9 137.12 138.482 137.09 138.102 136.963C136.701 136.425 135.547 135.548 134.802 134.456L118.003 113.031C117.801 112.761 117.518 112.534 117.18 112.372C116.044 111.826 114.57 112.121 113.888 113.031L97.0888 134.427C96.3604 135.534 95.2139 136.428 93.813 136.982C93.4338 137.11 93.0148 137.14 92.6131 137.069C92.2405 136.974 91.9135 136.79 91.6772 136.541C91.1021 135.895 90.8147 135.113 90.8612 134.321V65.6859C90.8936 63.6009 92.9968 61.9169 95.6009 61.891H116H136.398C138.978 61.9275 141.048 63.6102 141.054 65.6763V134.302C141.1 135.094 140.813 135.876 140.238 136.521Z" fill="#909090" />
                    <path d="M188.083 118.72C184.339 118.72 181.075 118.12 178.291 116.92C175.555 115.672 173.443 114.064 171.955 112.096C170.515 110.128 169.747 108.016 169.651 105.76C169.651 105.376 169.795 105.04 170.083 104.752C170.371 104.464 170.731 104.32 171.163 104.32H172.603C173.467 104.32 173.995 104.8 174.187 105.76C174.523 108.064 175.843 110.08 178.147 111.808C180.451 113.536 183.763 114.4 188.083 114.4C192.643 114.4 196.027 113.584 198.235 111.952C200.491 110.272 201.619 107.944 201.619 104.968C201.619 103.144 201.067 101.656 199.963 100.504C198.907 99.304 197.347 98.272 195.283 97.408C193.219 96.496 190.099 95.368 185.923 94.024C182.227 92.824 179.323 91.648 177.211 90.496C175.147 89.344 173.611 87.928 172.603 86.248C171.595 84.568 171.091 82.432 171.091 79.84C171.091 77.392 171.739 75.184 173.035 73.216C174.379 71.248 176.299 69.712 178.795 68.608C181.291 67.456 184.267 66.88 187.723 66.88C191.275 66.88 194.323 67.528 196.867 68.824C199.411 70.072 201.331 71.68 202.627 73.648C203.923 75.568 204.619 77.512 204.715 79.48C204.715 79.864 204.571 80.2 204.283 80.488C204.043 80.776 203.683 80.92 203.203 80.92H201.763C201.427 80.92 201.091 80.824 200.755 80.632C200.419 80.392 200.227 80.008 200.179 79.48C199.891 77.08 198.595 75.112 196.291 73.576C194.035 71.992 191.179 71.2 187.723 71.2C184.027 71.2 181.075 71.92 178.867 73.36C176.707 74.8 175.627 76.96 175.627 79.84C175.627 81.712 176.107 83.272 177.067 84.52C178.075 85.72 179.563 86.776 181.531 87.688C183.499 88.552 186.403 89.608 190.243 90.856C194.179 92.104 197.251 93.304 199.459 94.456C201.667 95.608 203.323 97 204.427 98.632C205.579 100.264 206.155 102.376 206.155 104.968C206.155 109.288 204.547 112.672 201.331 115.12C198.115 117.52 193.699 118.72 188.083 118.72ZM212.253 118C211.869 118 211.533 117.856 211.245 117.568C210.957 117.28 210.813 116.944 210.813 116.56L210.957 115.768L229.173 69.04C229.557 68.08 230.253 67.6 231.261 67.6H233.709C234.717 67.6 235.413 68.08 235.797 69.04L254.013 115.768L254.157 116.56C254.157 116.944 254.013 117.28 253.725 117.568C253.437 117.856 253.101 118 252.717 118H251.277C250.845 118 250.485 117.88 250.197 117.64C249.957 117.4 249.789 117.16 249.693 116.92L245.229 105.4H219.741L215.277 116.92C215.181 117.16 214.989 117.4 214.701 117.64C214.461 117.88 214.125 118 213.693 118H212.253ZM243.501 101.08L232.485 72.712L221.469 101.08H243.501ZM274.569 118C273.369 118 272.553 117.424 272.121 116.272L255.417 69.832L255.273 69.04C255.273 68.656 255.417 68.32 255.705 68.032C255.993 67.744 256.329 67.6 256.713 67.6H258.225C258.657 67.6 258.993 67.72 259.233 67.96C259.521 68.2 259.713 68.44 259.809 68.68L275.577 112.744L291.345 68.68C291.441 68.44 291.609 68.2 291.849 67.96C292.137 67.72 292.497 67.6 292.929 67.6H294.441C294.825 67.6 295.161 67.744 295.449 68.032C295.737 68.32 295.881 68.656 295.881 69.04L295.737 69.832L279.033 116.272C278.601 117.424 277.785 118 276.585 118H274.569ZM306.875 118C306.395 118 306.011 117.856 305.723 117.568C305.435 117.28 305.291 116.896 305.291 116.416V69.256C305.291 68.776 305.435 68.392 305.723 68.104C306.011 67.768 306.395 67.6 306.875 67.6H334.955C335.483 67.6 335.891 67.744 336.179 68.032C336.467 68.32 336.611 68.728 336.611 69.256V70.336C336.611 70.816 336.443 71.2 336.107 71.488C335.819 71.776 335.435 71.92 334.955 71.92H309.827V90.28H333.371C333.899 90.28 334.307 90.424 334.595 90.712C334.883 91 335.027 91.408 335.027 91.936V93.016C335.027 93.496 334.859 93.88 334.523 94.168C334.235 94.456 333.851 94.6 333.371 94.6H309.827V113.68H335.531C336.059 113.68 336.467 113.824 336.755 114.112C337.043 114.4 337.187 114.808 337.187 115.336V116.416C337.187 116.896 337.019 117.28 336.683 117.568C336.395 117.856 336.011 118 335.531 118H306.875Z" fill="#909090" />
                </svg><br>

                <b>3. See your Studylists on the dashboard</b><br>
                <p>All your Studylists can be found on your dashboard.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Got It!</button>
            </div>
        </div>
    </div>
</div>