<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
