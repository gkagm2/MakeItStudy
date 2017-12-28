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

//url의 규칙을 의미함.   topic/로 하고 (:num)은 숫자를 의미함.   topic/뒤에  숫자가 온다면  topic/get/$1을 인자로 전달한다.
//:num 부분의 값이 $1이라고하는 파라미터가 돼서 뒤에있는 $1이라는 값에 치환됨.
//:num이 10이면  $1이 10으로 된다는 말임.
$route['topic/(:num)'] = "topic/get/$1";
$route['post/(:num)'] = "topic/get/$1";
$route['topic/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";

//사용자가 어떤 path를 지정하지 않고 웹 어플리케이션에 접속했을 때 어떤 controller를 실행할 것인지 결정해주는 것
//$route['default_controller'] = 'welcome'; //사용자가 아무런 정보도 적지 않고 접속 했을 시 welcome이라는 class를 호출한다.
$route['default_controller'] = 'topic/index'; //topic/index로 설정
$route['404_override'] = 'errors/notfound'; //사용자가 존재하지 않는 url로 접속 할 경우 설정.
$route['translate_uri_dashes'] = FALSE; 
