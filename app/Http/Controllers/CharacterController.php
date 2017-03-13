<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
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
    public function index(Request $request)
    {
      $orderby = $request->input('orderby');

      $ts = time();
      $publicKey = env('APP_KEY');
      $privateKey = env('APP_KEY_PRIVATE');
      $hash = md5($ts . $privateKey . $publicKey);

      $params = [
        "ts" => $ts,
        "apikey" => $publicKey,
        "hash" => $hash,
        "limit" => 10
      ];

      if ($orderby) $params["orderBy"] = $orderby;

      $client = new Client([ 'base_uri' => 'http://gateway.marvel.com/v1/public/', 'timeout'  => 2.0 ]);

      $response = $client->request("GET", "characters", ["query" => $params]);

      $code = $response->getStatusCode();

      if ($code == 200) {

        $result = json_decode($response->getBody()->getContents(), true)["data"];

        $characters = array();

        foreach($result["results"] as $item) {

          array_push($characters, array(
            "id" => $item["id"],
            "name" => $item["name"],
            "image" => $item["thumbnail"]["path"] . "." . $item["thumbnail"]["extension"],
            "description" => $item["description"],
            "comics" => $item["comics"]["items"]));
        }

        return view('home')->with(['characters' => $characters, "orderby" => $orderby]);
      }
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
