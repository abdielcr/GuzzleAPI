<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use GuzzleHttp\Client;

Route::get('/', function () {
//Route API Guzzgle
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://jsonplaceholder.typicode.com/',
    // You can set any number of default request options.
    'timeout'  => 10.0,
    
]);
    // Send a request to https://foo.com/api/test
$response = $client->request('GET', 'posts');

//Check Response Content
//dd($response->getBody()->getContents());
//Return json on Browser
//return json_decode($response->getBody()->getContents());

//save request
 
$posts = json_decode($response->getBody()->getContents());

return view('posts.index', compact('posts')); 

//return view('welcome');
});

