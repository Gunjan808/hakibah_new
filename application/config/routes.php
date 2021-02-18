<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https:   //codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/** Default Controller */
$route['default_controller'] = DEFAULT_CONTROLLER;
//$route['default_controller'] = 'page/home';

/** All Pages */
$route['upload-successfull']                    = 'page/uploadSuccessPage';
$route['add-to-my-course/(:any)/(:any)/(:any)'] = 'page/addtomycourse/$1/$2/$3';
$route['add-to-my-book/(:any)/(:any)']          = 'page/addtomybook/$1/$2';
$route['remove-to-my-book/(:any)/(:any)']       = 'page/removetomybook/$1/$2';
$route['remove-to-my-course/(:any)/(:any)/(:any)']     = 'page/removetomycourse/$1/$2/$3';
$route['book']                                  = 'page/books';
$route['book/(:any)']                           = 'page/book/$1';
$route['course/(:any)/(:any)']                  = 'page/course/$1/$2';
$route['document/(:any)/(:any)']                = 'page/document/$1/$2';
$route['faq/(:any)']                            = 'page/faqSingle/$1';
$route['faq/(:any)/(:any)']                     = 'page/faq/$1/$2';
$route['faqs']                                  = 'page/faqs';
$route['faqSearch']                             = 'page/faqSearch';
$route['follow/(:any)']                         = 'page/follow/$1';
$route['helpful/(:any)/(:any)']                 = 'page/helpful/$1/$2';
$route['institution']                           = 'page/universities';
$route['institution/(:any)']                    = 'page/university/$1';
$route['login']                                 = 'page/login';
$route['logout']                                = 'page/logout';
$route['notifications']                         = 'page/notifications';
$route['panel']                                 = 'page/panel';
$route['payment']                               = 'page/payment';
$route['profile']                               = 'page/profile';
$route['register']                              = 'page/register';
$route['search']                                = 'page/search';
$route['setting']                               = 'page/setting';
$route['studylist/(:any)']                      = 'page/studylist/$1';
$route['likedlist/(:any)']                      = 'page/likedlist/$1';
$route['subscription']                          = 'page/subscription';
$route['unfollow/(:any)']                       = 'page/unfollow/$1';
$route['upload']                                = 'page/upload';
$route['upload/file']                           = 'page/uploadDoc';
$route['user/profile/(:any)/(:any)']            = 'page/user/$1/$2';
$route['user/uploads']                          = 'page/uploads';
$route['verification']                          = 'page/verification';
$route['verify-email/(:any)/(:any)']            = 'page/verifyEmail/$1/$2';
$route['doctopdf']                      = 'pdf/convert';
$route['forgot-password']               = 'page/forgotPassword';
$route['password-update/(:any)/(:any)'] = 'page/passwordUpdate/$1/$2';

$route['create-course'] = 'page/createCourse';

/** Ajax */
$route['fetch/books']                   = 'AjaxController/searchBook';
$route['fetch/courses']                 = 'AjaxController/searchCourse';
$route['fetch/search']                  = 'AjaxController/search';
$route['fetch/universities']            = 'AjaxController/searchUniversity';
$route['fetch/selected-course']         = 'AjaxController/searchGetCourse';
$route['fetch/university-list']         = 'AjaxController/universityList';
$route['fetch/document-list']           = 'AjaxController/documentList';
$route['fetch/uniList']                 = 'AjaxController/uniName';
$route['fetch/change_follow_status']    = 'AjaxController/change_follow_status';
$route['fetch/like_unlike_doc']         = 'AjaxController/like_unlike_doc';
$route['fetch/delete_comment']          = 'AjaxController/delete_comment';
$route['fetch/post_course_comment']     = 'AjaxController/post_course_comment';
$route['fetch/post_course_like']        = 'AjaxController/post_course_like';


/** Dashboard */
$route['dashboard/login']  = 'admin/login';
$route['dashboard/logout'] = 'admin/logout';
$route['dashboard']        = 'admin/home';

/** Profile */
$route['user/(:any)'] = 'user/view_user/$1';

$route['upload/document'] = 'document/uploadDoc';

/** List */
// $route['list/([^/]+)/?']  = 'user/list_user/$1'; // To Show List/Super-admin or List/admin or List/manager
$route['list/all/([^/]+)/?']           = 'user/list_users/$1';
$route['list/assign-users']            = 'UserRole/list_roles';
$route['list/associate_program']       = 'lead/list_associate_program';
$route['list/books']                   = 'book/list_book';
$route['list/categories']              = 'category/list_category';
$route['list/comments']                = 'comment/list_comment';
$route['list/contact-us']              = 'lead/list_contactus';
$route['list/content']                 = 'Content/list_content';
$route['list/courses']                 = 'course/list_course';
$route['list/courses/(:any)']          = 'course/list_course/$1';
$route['list/customers']               = 'lead/list_customers';
$route['list/documents']               = 'document/list_document';
$route['list/documents/(:any)']        = 'document/list_document/$1';
$route['list/documents/(:any)/(:any)'] = 'document/list_document/$1/$2';
$route['list/faqs']                    = 'faq/list_faq';
$route['list/filters']                 = 'filter/list_filter';
$route['list/galleries']               = 'gallery/list_galleries';
$route['list/languages']               = 'language/list_language';
$route['list/leads']                   = 'lead/list_leads';
$route['list/orders']                  = 'order/list_orders';
$route['list/posts']                   = 'post/list_post';
$route['list/products']                = 'product/list_products';
$route['list/projects']                = 'project/list_projects';
$route['list/properties']              = 'property/list_property';
$route['list/reports']                 = 'report/list_report';
$route['list/requests']                = 'request/list_request';
$route['list/roles']                   = 'UserRole/list_roles';
$route['list/scraped']                 = 'lead/list_scraped';
$route['list/settings']                = 'setting/list_setting';
$route['list/sliders']                 = 'slider/list_sliders';
$route['list/testimonials']            = 'testimonial/list_testimonial';
$route['list/tests']                   = 'test/list_test';
$route['list/universities']            = 'university/list_university';

$route['list/career']     = 'Career/list_application';
$route['list/cpt/(:any)'] = 'Cpt/list_post/$1';


/** Add */
$route['add/book']        = 'book/add_book';
$route['add/category']    = 'category/add_category';
$route['add/comment']     = 'comment/add_comment';
$route['add/content']     = 'Content/add_content';
$route['add/course']      = 'course/add_course';
$route['add/document']    = 'document/add_document';
$route['add/faq']         = 'faq/add_faq';
$route['add/filter']      = 'filter/add_filter';
$route['add/gallery']     = 'gallery/add_gallery';
$route['add/language']    = 'language/add_language';
$route['add/lead']        = 'lead/add_lead';
$route['add/order']       = 'order/add_order';
$route['add/post']        = 'post/add_post';
$route['add/product']     = 'product/add_product';
$route['add/project']     = 'project/add_project';
$route['add/property']    = 'property/add_property';
$route['add/report']      = 'report/add_report';
$route['add/request']     = 'request/add_request';
$route['add/slider']      = 'slider/add_slider';
$route['add/test']        = 'test/add_test';
$route['add/testimonial'] = 'testimonial/add_testimonial';
$route['add/university']  = 'university/add_university';
$route['add/user-role']   = 'UserRole/add_role';
$route['add/user']        = 'user/add_user';

$route['add/cpt/(:any)']    = 'Cpt/add_post/$1';


/** Edit */
$route['edit/book/(:any)']        = 'book/edit_book/$1';
$route['edit/category/(:any)']    = 'category/edit_category/$1';
$route['edit/comment/(:any)']     = 'comment/edit_comment/$1';
$route['edit/course/(:any)']      = 'course/edit_course/$1';
$route['edit/document/(:any)']    = 'document/edit_document/$1';
$route['edit/faq/(:any)']         = 'faq/edit_faq/$1';
$route['edit/filter/(:any)']      = 'filter/edit_filter/$1';
$route['edit/gallery/(:any)']     = 'gallery/edit_gallery/$1';
$route['edit/language/(:any)']    = 'language/edit_language/$1';
$route['edit/lead/(:any)']        = 'lead/edit_lead/$1';
$route['edit/order/(:any)']       = 'order/edit_order/$1';
$route['edit/post/(:any)']        = 'post/edit_post/$1';
$route['edit/post/(:any)/(:any)'] = 'Cpt/edit_post/$1/$2';
$route['edit/product/(:any)']     = 'product/edit_product/$1';
$route['edit/project/(:any)']     = 'project/edit_project/$1';
$route['edit/property/(:any)']    = 'property/edit_property/$1';
$route['edit/report/(:any)']      = 'report/edit_report/$1';
$route['edit/request/(:any)']     = 'request/edit_request/$1';
$route['edit/setting/(:any)']     = 'setting/edit_setting/$1';
$route['edit/slider/(:any)']      = 'slider/edit_slider/$1';
$route['edit/test/(:any)']        = 'test/edit_test/$1';
$route['edit/testimonial/(:any)'] = 'testimonial/edit_testimonial/$1';
$route['edit/university/(:any)']  = 'university/edit_university/$1';
$route['edit/user-role/(:any)']   = 'UserRole/edit_role/$1';
$route['edit/user/(:any)']        = 'user/edit_user/$1';
$route['update/document/(:any)']  = 'document/update_status/$1';


/** Delete */
$route['delete/book/(:any)']        = 'book/delete_book/$1';
$route['delete/category/(:any)']    = 'category/delete_category/$1';
$route['delete/comment/(:any)']     = 'comment/delete_comment/$1';
$route['delete/course/(:any)']      = 'course/delete_course/$1';
$route['delete/document/(:any)']    = 'document/delete_document/$1';
$route['delete/faq/(:any)']         = 'faq/delete_faq/$1';
$route['delete/filter/(:any)']      = 'filter/delete_filter/$1';
$route['delete/gallery/(:any)']     = 'gallery/delete_gallery/$1';
$route['delete/language/(:any)']    = 'language/delete_language/$1';
$route['delete/lead/(:any)']        = 'lead/delete_lead/$1';
$route['delete/order/(:any)']       = 'order/delete_order/$1';
$route['delete/post/(:any)']        = 'post/delete_post/$1';
$route['delete/product/(:any)']     = 'product/delete_product/$1';
$route['delete/project/(:any)']     = 'project/delete_project/$1';
$route['delete/property/(:any)']    = 'property/delete_property/$1';
$route['delete/report/(:any)']      = 'report/delete_report/$1';
$route['delete/request/(:any)']     = 'request/delete_request/$1';
$route['delete/slider/(:any)']      = 'slider/delete_slider/$1';
$route['delete/test/(:any)']        = 'test/delete_test/$1';
$route['delete/testimonial/(:any)'] = 'testimonial/delete_testimonial/$1';
$route['delete/university/(:any)']  = 'university/delete_university/$1';
$route['delete/user-role/(:any)']   = 'UserRole/delete_role/$1';

$route['delete/cpt/(:any)/(:any)'] = 'Cpt/delete_post/$1/$2';

$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
