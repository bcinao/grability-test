
@extends('layouts.base')

@section('content')
  <div class="container">
      <div class="content"></div>
      <div ng-controller="CharactersController as character">
        <h1>{{character.product.name}}</h1>
        <p>{{character.product.price}}</p>
        <p>{{character.product.descripcion}}</p>
      </div>
  </div>
@endsection
