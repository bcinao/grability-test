@extends('layouts.base')

@section('content')

<div class="container-fluid">
  <div class="row row-eq-height-md">
    <div class="col-md-9">
      <div class="row row-align padding-small">
        <div class="col-xs-6">
          <h2 class="pull-left title title-characters"><strong>Characters</strong></h2>
        </div>
        <div class="col-xs-6">

        </div>
      </div>

    </div>
    <div class="col-md-3 bar-favourites">
      <div class="list-favourites" ng-controller="FavouritesController as favourites">
        <h2 class="title title-favourites"><strong>My favourites</strong></h2>
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-12" ng-repeat="favourite in favourites">
            <div class="box-favourites" ng-click="getComic(favourite.resourceURI)">
              <button type="button" class="close" ng-click="remove(favourite.id)" aria-label="Close"><img src="/img/btn-delete.png" /></button>
              <img ng-src="{{ favourite.image }}" class="img-responsive image-favourite" alt="" />
              <p class="name-favourite">{{ favourite.title }}</p>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div id="view-comics" class="modal fade" tabindex="-1" role="dialog" ng-controller="ComicsController as comics">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="/img/btn-close.png" /></button>
        <div class="media">
          <div class="media-left hidden-xs">
            <a href="#">
              <img class="media-object img-comics" ng-src="{{ comic.image }}" alt="">
            </a>
          </div>
          <div class="media-body">
            <h3 class="media-heading text-uppercase">{{ comic.title }}</h3>
            <p class="description-character">{{ comic.description }}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-xs-6 button button-addfavourites text-center" ng-class="{ 'added': added }" ng-click="addFavourites()">
            <img ng-src="{{ added && '/img/btn-favourites-primary.png' || '/img/btn-favourites-default.png' }}"  /><span class="text-uppercase">Add to favourites</span>
          </div>
          <div class="col-xs-6 button button-buy text-center">
            <img src="/img/shopping-cart-primary.png" /><span class="text-uppercase">Buy for ${{ comic.price }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
