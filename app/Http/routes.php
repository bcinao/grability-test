<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Blade::setContentTags('<{', '}>');
Blade::setEscapedContentTags('<{{', '}}>');

Route::get('/', function () {

  $characters = array(
    array('id' => 1, 'name'  => 'Spider-Man', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 2, 'name'  => 'Black Widow', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/10/537ba3f27a6e0/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 3, 'name'  => 'Captain America', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/3/50/537ba56d31087/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 4, 'name'  => 'Wolverine', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/2/60/537bcaef0f6cf/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 5, 'name'  => 'Daredevil', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 6, 'name'  => 'Luke Cage', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 7, 'name'  => 'Thor', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 8, 'name'  => 'Ultron', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 9, 'name'  => 'Captain Marvel', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
    array('id' => 10, 'name'  => 'Hulk', 'image' => 'https://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg', 'description' => 'texto de prueba', 'comics' => array(array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'), array('name' => 'related comic name two lines'))),
  );

  return view('home')->with(['characters' => $characters]);
});
