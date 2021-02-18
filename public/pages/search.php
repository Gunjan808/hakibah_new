<!-- Search Section -->
<style>
    .select2-selection__choice {
        background: transparent !important;
        border: none !important;
    }

    .select2-selection__clear,text-secondary d-inline mr-2
    .select2-selection__choice {
        margin: 0 !important;
    }

    .select2-selection__choice>span {
        display: none !important;
    }

    .select2-selection,
    .select2-selection--multiple {
        background: white !important;
        height: 45px !important;
    }
    .widthMObile-img{width: 15%;}
    @media (max-width: 767px){
        .xs-100{
            width: 100%;
        }
        .flex-Mobile-xs{flex-direction: row;}
        .widthMObile-img{width: 150px;}
    }
    .font-14{
        font-size: 14px;
    }
    .btn-sm{
        font-size: 12px;
    }
</style>
<section class="border-bottom">
    <div style="background:#f2f3f5;" class="py-4">
        <div class="container">
            <div class="row">
               
				<div class="col-md-10">
                    <div class="d-inline-flex bg-white align-items-center rounded shadow-sm py-1 w-100">
                        <div class="p-3 text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <div class="form-group mb-0 w-100">
                            <input type="text" name="search" id="search" class="form-control border-0 rounded-0 shadow-none" placeholder="Type to start searching" value="<?php is($_GET['query'], 'show') ?>">
                        </div>
                        <div class="py-1 px-3">
                            <button type="button" id="searchBtn" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                  </div>
				 
				  


				  <div class=" col-md-2" style="padding-top:10px; float:right">
							 <button type="button" value="Show Div"  id="toggle-button" onclick="showhide(mydiv)" class="btn btn-primary xs-100">
                               Advance Search
                            </button>
							
				</div>
             
			 
			 

<script>
document.getElementById('toggle-button').addEventListener('click', function () {
    toggle(document.querySelectorAll('.target'));
});

function toggle (elements, specifiedDisplay) {
  var element, index;

  elements = elements.length ? elements : [elements];
  for (index = 0; index < elements.length; index++) {
    element = elements[index];

    if (isElementHidden(element)) {
      element.style.display = '';

      // If the element is still hidden after removing the inline display
      if (isElementHidden(element)) {
        element.style.display = specifiedDisplay || 'block';
      }
    } else {
      element.style.display = 'none';
    }
  }
  function isElementHidden (element) {
    return window.getComputedStyle(element, null).getPropertyValue('display') === 'none';
  }
}
</script>
                <div class="col-md-12 mt-3 target" id="showmehideme" style="display:none;" >
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group mb-0">
                                <label for="universities">University filter</label>
                                <!-- <input type="text" class="form-control shadow-none" id="uniInput" name="universities" list="uniList" placeholder="Search for your university">
                                <datalist id="uniList"></datalist> -->
                                <select class="form-control shadow-none w-100 custom-select" id="university-search" name="university_id" multiple="true" data-live-search="true" title="Search for your university"></select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group mb-0">
                                <label for="course">Course filter</label>
                                <select style="height: 44px;" class="form-control shadow-none w-100 custom-select" id="course-search" multiple="true" name="course_id" data-live-search="true" title="Search for your course">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group mb-0">
                                <label for="category-search">Category filter</label>
                                <select class="custom-select shadow-none" id="category-search" name="category_id" data-live-search="true" title="Filter by category">
                                    <option value="" hidden>Filter by category</option>
                                    <?php if (is($data['categories'], 'array')) foreach ($data['categories'] as $category) : ?>
                                        <option value="<?php is($category->id, 'show'); ?>">
                                            <?php is($category->title, 'showCapital'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group mb-0">
                                <label for="language-search">Language filter</label>
                                <select class="custom-select shadow-none" id="language-search" name="language_id" data-live-search="true" title="Filter by language">
                                    <option value="" hidden>Filter by language</option>
                                    <?php if (is($data['languages'], 'array')) foreach ($data['languages'] as $language) : ?>
                                        <option value="<?php is($language->id, 'show'); ?>">
                                            <?php is($language->title, 'showCapital'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="py-3">
    <div class="container">
        <!--<div class="row">-->
        <!--    <div class="col-md-12">-->
        <!--        <h6 class="mb-3">-->
        <!--            Notes, Summaries And Exams Study Documents-->
        <!--        </h6>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="row">
            <div class="col-md-12">
                <h6 class="mb-3">
                    <strong><?php is($_GET['query'], 'show') ?></strong> Notes, Summaries And Exams Study Documents
                </h6>
            </div>
        </div>
        
        <!--When search did not found-->
        <div class="row d-none">
            <div class="col-md-12">
                <h6 class="mb-3">
                    Your search -<strong>kjsdfkdsjl</strong>- did not match any documents.
                </h6>
            </div>
        </div>

        <div class="row" id="searchResult">
            <div class="col-md-12">
                <div class="row">
                    <?php if (is($data['books'], 'array')) foreach ($data['books'] as $book) : ?>
                        <div class="col-md-4 mb-4">
                            <a href="<?php echo SITE_URL; ?>book/<?php is($book->slug, 'show'); ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="d-flex" style="flex-direction: row;">
                                                <svg class="ic ic-book card-type ic ic-book--small" height="24" viewBox="0 0 66 84">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path fill="#9C5BC2" d="M1.75328636,1.77389063 C2.82636093,0.701973678 4.24437907,0.110676799 6.00734077,0 L60.0030119,0 C61.9041469,0.230989222 63.3190178,0.811097243 64.2476247,1.74032406 C65.1762315,2.66955088 65.7603566,4.08977347 66,6.00099182 L66,77.9809672 C65.9295984,79.7064607 65.3646198,81.1037241 64.3050642,82.1727573 C63.2455086,83.2417906 61.8219305,83.8508715 60.0343298,84 L6.00764276,84 C4.12887902,83.7796163 2.7242229,83.203659 1.79367439,82.272128 C0.863125894,81.3405971 0.265234429,79.9118925 0,77.9860143 L0,6.00086016 C0.0957830009,4.25479743 0.680211787,2.84580759 1.75328636,1.77389063 Z"></path>
                                                        <polygon fill="#FFF" points="10 0 25 0 25 22 17.5 15.6 10 22"></polygon>
                                                        <g fill="#FFF" transform="translate(10 39)">
                                                            <rect width="24" height="3" rx="1.5"></rect>
                                                            <rect width="44" height="3" y="13" rx="1.5"></rect>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="ml-2 text-secondary">Book</span>
                                            </div>
                                            <div class="h5 mt-2 mb-5">
                                                <span class="text-primary">
                                                    <?php is($book->title, 'showCapital') ?>
                                                </span>
                                            </div>
                                            <span class="text-secondary"><?php is($book->author, 'showCapital'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <?php if (is($data['courses'], 'array')) foreach ($data['courses'] as $course) : ?>
                        <div class="col-md-4 mb-4">
                            <a href="<?php echo SITE_URL; ?>course/<?php is($course->university_slug, 'show') ?>/<?php is($course->slug, 'show'); ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="d-flex" style="flex-direction: row;">
                                                <svg class="ic ic-course card-type ic-course--small" height="20" viewBox="0 0 16 12">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path fill="#91D7B3" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                        <rect width="16" height="11" y="1" fill="#91D7B3" rx="2"></rect>
                                                        <rect width="16" height="10" y="2" fill="#56BA89" rx="1"></rect>
                                                        <rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
                                                        <rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
                                                    </g>
                                                </svg>
                                                <span class="ml-2 text-secondary">Course</span>
                                            </div>
                                            <div class="h5 mt-2 mb-5">
                                                <span class="text-primary">
                                                    <?php is($course->title, 'showCapital') ?>
                                                </span>
                                            </div>
                                            <span class="text-secondary"><?php is($course->university, 'showCapital'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    <?php endforeach; ?>
                </div>
                
                

                <div class="row">
                    <?php if (is($data['documents'], 'array')) : ?>
                        <?php foreach ($data['documents'] as $document) : ?>
                            <div class="col-md-12 p-0 border-bottom myHover">
                                <div class="d-flex p-3 flex-Mobile-xs">
                                    <div class="mr-3 pt-3 px-3 widthMObile-img" style="background:#e9e9e9; height: 80px; overflow:hidden;">
                                        <?php if (!empty($document->image)) : ?>
                                            <img class="w-100" src="<?php is($document->image, 'show'); ?>" alt="<?php is($document->title, 'show') ?>">
                                        <?php else : ?>
                                            <img class="w-50" src="<?php echo SITE_URL ?>uploads/image/default_image.png" alt="<?php is($document->title, 'show') ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div style="flex-grow: 1;">
                                        <div class="">
                                            <div class="d-sm-flex align-items-center">
                                                <a href="<?php echo SITE_URL; ?>document/<?php is($document->slug, 'show') ?>/<?php is($document->id, 'show') ?>" class=" font-weight-bold">
                                                    <?php is($document->title, 'showCapital'); ?>
                                                </a>
                                                <button class="btn btn-sm btn-white rounded-pill d-sm-inline-block d-block ml-sm-3" style="border-color: #dbdddf; color: #9ea9b5">
                                                    <?php is($document->category_title, 'showCapital'); ?>
                                                </button>
                                            </div>

                                            <div class="d-block font-14">
                                                <a href="<?php echo SITE_URL; ?>course/<?php is($document->university_slug, 'show'); ?>/<?php is($document->course_slug, 'show'); ?>" class="text-dark font-weight-bold">
                                                    <?php is($document->course_title, 'showCapital'); ?>
                                                </a>
                                                <span class="mx-2">
                                                    <svg width="6" height="6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                    </svg>
                                                </span>
                                                <span class="text-secondary">
                                                    <?php is($document->university_title, 'showCapital'); ?>
                                                </span>
                                            </div>

                                            <div class="mb-1">
                                                <a href="<?php echo SITE_URL; ?>book/<?php is($document->book_slug, 'show'); ?>" class="text-secondary" style="font-size: 14px;">
                                                    <?php is($document->book_title, 'showCapital'); ?>
                                                </a>
                                            </div>



                                            <div class="text-secondary d-inline mr-2">
                                                <svg width="9" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <path fill="currentColor" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"></path>
                                                </svg>
                                                <span style="font-size: 12px;" class="ml-1">
                                                    <?php is($document->doc_pages, 'show'); ?> pages
                                                </span>
                                            </div>
                                            <div class="text-secondary d-inline mr-2">
                                                <svg width="9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                                                </svg>
                                                <span style="font-size: 12px;" class="ml-1">
                                                    <?php if (is($document->created_date)) : ?>
                                                        <?php echo date('M Y', strtotime($document->created_date)); ?>
                                                    <?php endif; ?>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="font-14">
                                        <div class="text-success d-inline mr-2">
                                            <svg width="20" height="20" style="margin-bottom: 7px;" class="svg-inline--fa fa-thumbs-up fa-w-16 thumb--neBaI" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                            </svg>
                                        </div> 100%
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-warning w-100">
                            <span>Document not found.</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>