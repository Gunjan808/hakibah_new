<!-- Search Section -->
<section>
    <div style="background:#f2f3f5 top;  background-size: cover; text-align:center">
        <div style="height: 70vh; display:grid; place-items: center">
            <div class="text-center">
                <div class="mb-3">
                    <svg class="ic ic-book icon--3UvnS" width="66" height="84" viewBox="0 0 66 84">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#9C5BC2" d="M1.75328636,1.77389063 C2.82636093,0.701973678 4.24437907,0.110676799 6.00734077,0 L60.0030119,0 C61.9041469,0.230989222 63.3190178,0.811097243 64.2476247,1.74032406 C65.1762315,2.66955088 65.7603566,4.08977347 66,6.00099182 L66,77.9809672 C65.9295984,79.7064607 65.3646198,81.1037241 64.3050642,82.1727573 C63.2455086,83.2417906 61.8219305,83.8508715 60.0343298,84 L6.00764276,84 C4.12887902,83.7796163 2.7242229,83.203659 1.79367439,82.272128 C0.863125894,81.3405971 0.265234429,79.9118925 0,77.9860143 L0,6.00086016 C0.0957830009,4.25479743 0.680211787,2.84580759 1.75328636,1.77389063 Z"></path>
                            <polygon fill="#FFF" points="10 0 25 0 25 22 17.5 15.6 10 22"></polygon>
                            <g fill="#FFF" transform="translate(10 39)">
                                <rect width="24" height="3" rx="1.5"></rect>
                                <rect width="44" height="3" y="13" rx="1.5"></rect>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="px-3 text-secondary">
                    <h2 class="font-weight-bold mb-4">
                        Which book do you need?
                    </h2>
                    <p>
                        Search for a book and find study material about it
                    </p>
                </div>

                <div class="d-inline-flex bg-white align-items-center rounded shadow-sm py-1" style="width: 60vw;">
                    <div class="p-3 text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <div class="form-group mb-0 w-100">
                        <!-- <input type="text" name="search" id="search" class="form-control border-0 rounded-0 shadow-none" placeholder="Type to start searching">  -->
                        <span contenteditable='true' class="text-left form-control border-0 rounded-0 shadow-none" id="searchBook">
                            Type to start searching
                        </span>
                    </div>
                    <!-- <div class="py-1 px-3">
                        <button class="btn btn-primary">
                            Search
                        </button>
                    </div> -->
                </div>
                <ul class="list-group text-left position-absolute mx-auto" id="showBook" style="display:none; left: 0; right: 0; z-index: 999999; width: 60vw"></ul>
            </div>
        </div>


        <div class="pb-4 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>
</section>

<section>
    <div class="container my-3 mt-5">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="border-bottom pb-2">
                    <h4>Most Popular Documents</h4>
                </div>
            </div>

            <?php if (is($data['books'], 'array')) foreach ($data['books'] as $book) : ?>
                <div class="col-md-12 mb-3">
                    <div class="media d-flex align-items-center border-bottom py-3">
                        <div class="mr-3">
                            <svg class="ic ic-book ic ic-book--small" height="24" viewBox="0 0 66 84">
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#9C5BC2" d="M1.75328636,1.77389063 C2.82636093,0.701973678 4.24437907,0.110676799 6.00734077,0 L60.0030119,0 C61.9041469,0.230989222 63.3190178,0.811097243 64.2476247,1.74032406 C65.1762315,2.66955088 65.7603566,4.08977347 66,6.00099182 L66,77.9809672 C65.9295984,79.7064607 65.3646198,81.1037241 64.3050642,82.1727573 C63.2455086,83.2417906 61.8219305,83.8508715 60.0343298,84 L6.00764276,84 C4.12887902,83.7796163 2.7242229,83.203659 1.79367439,82.272128 C0.863125894,81.3405971 0.265234429,79.9118925 0,77.9860143 L0,6.00086016 C0.0957830009,4.25479743 0.680211787,2.84580759 1.75328636,1.77389063 Z"></path>
                                    <polygon fill="#FFF" points="10 0 25 0 25 22 17.5 15.6 10 22"></polygon>
                                    <g fill="#FFF" transform="translate(10 39)">
                                        <rect width="24" height="3" rx="1.5"></rect>
                                        <rect width="44" height="3" y="13" rx="1.5"></rect>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <a href="<?php echo SITE_URL; ?>book/<?php is($book->slug, 'show') ?>" class="text-primary d-block">
                                <?php is($book->title, 'showCapital'); ?>
                            </a>
                            <span class="text-secondary font-small">
                                <?php is($book->author, 'showCapital'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section>
    <div class="container my-5 py-4 border-bottom">
        <div class="row">
            <div class="col-md-12">
                <h4>All courses</h4>
            </div>
            <div class="col-md-12 mt-3">
                <?php $letters = range('A', 'Z');
                foreach ($letters as $letter) : ?>
                    <button class="btn btn-outline-primary shadow-sm px-3 py-2 mr-2 mb-2" style="border-color: #e6e9ec">
                        <?php echo $letter ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>