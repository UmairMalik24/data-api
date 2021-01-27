<?php
/** @var \Laravel\Lumen\Routing\Router $router */


/*

|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use App\Http\Middleware\TokenValidation;


$router->get('/', 'Controller@Alldata');
$router->get('/categories', 'Controller@all_cat');
$router->get('/category/{id}', 'Controller@cat_specific');
$router->get('/userdata', 'Controller@usergenData');
$router->get('/userdata/get/{id}', 'Controller@spec_user_gen');
$router->get('/fav/{id}', 'Controller@user_fav');
$router->get('/data/{id}', 'Controller@lang_specific');
$router->get('data/user/{id}', 'Controller@user_specific');
$router->get('/languages', 'Controller@all_lang');
$router->get('/language/{id}', 'Controller@lang_specific');
$router->get('/lastmonth/top30', 'Controller@most_liked_month');
$router->get('/recent', 'Controller@most_recent');
$router->get('/lastweek/top20', 'Controller@most_liked_week');


$router->post('/search/text', 'PostController@search');
$router->post('/search/author', 'PostController@searchbyname');

$router->post('/category/store', 'PostController@addCategory');
$router->post('/data/store', 'PostController@store_data');
$router->post('/user/store', 'PostController@addUser');
$router->post('/like', 'PostController@like');
$router->post('/dislike', 'PostController@dislike');
$router->post('/report', 'PostController@report');
$router->post('/data/approve', 'PostController@approve');
$router->post('/data/block', 'PostController@block');


