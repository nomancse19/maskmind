<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';

$route['maskmind/admin/01521451354'] = 'admin/maskmindadminbackendcontrol';
$route['maskmind/admin/01713660299'] = 'admin/maskmindadminbackendcontrol';
$route['maskmind/admin_login/login_check'] = 'admin/admin_login_check';

$route['MaskmindOwner/dashboard'] = 'super_admin/index';
$route['MaskmindOwner/MaskUserList'] = 'super_admin/mask_userlist';
$route['MaskmindOwner/ManageGiftCard'] = 'super_admin/manage_gift_card';
$route['logout'] = 'super_admin/logout';

/*-------------------------------------------------------------------------
MaskMind App Api Route Start Here
Api Design & Developed By - Jahidul Islam Noman
Date And Time : 21-08-2020 5:44pm
Cell- 01521451354
Web: https://noman-it.com
---------------------------------------------------------------------------*/

$route['mask/app/api/v1/UserLogin'] = 'maskmind_app/app/api/v1/UserLogin';
$route['mask/app/api/v1/UserReferCheck'] = 'maskmind_app/app/api/v1/UserReferCheck';
$route['mask/app/api/v1/AllVideoList'] = 'maskmind_app/app/api/v1/AllVideoList';
$route['mask/app/api/v1/WatchVideoPoint'] = 'maskmind_app/app/api/v1/WatchVideoPoint';
$route['mask/app/api/v1/GiftCardCheck'] = 'maskmind_app/app/api/v1/GiftCardCheck';
$route['mask/app/api/v1/UserHomeData'] = 'maskmind_app/app/api/v1/UserHomeData';
$route['mask/app/api/v1/UserInfoUpdate'] = 'maskmind_app/app/api/v1/UserInfoUpdate';








/*-------------------------------------------------------------------------
MaskMind App Api Route End Here
Api Design & Developed By - Jahidul Islam Noman
Date And Time : 21-08-2020 5:44pm
Cell- 01521451354
Web: https://noman-it.com
---------------------------------------------------------------------------*/



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
