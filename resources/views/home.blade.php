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
          <form method="GET" action="#">
            <select id="select-sortby" name="orderby" onchange="this.form.submit()" class="form-control input-lg pull-right select-sortby">
              <option value="">Sort by</option>
              <option ng-repeat="n in ['name']" ng-value="n">{{ n }}</option>
            </select>
          </form>
        </div>
      </div>
      <div class="list-characters" ng-controller="CharactersController as characters">
        @if (count($characters) > 0)
          <div class="row">
          @foreach($characters as $character)
            <div class="col-md-6">
              <div class="box-character">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-character" width="180" height="180" src="<{ $character['image'] }>" alt="<{ $character['name'] }>">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading name-character"><{ $character['name'] }></h4>
                    <p class="description-character"><{ $character['description'] }></p>
                    <a href="/character/<{$character['id']}>" class="btn btn-primary text-uppercase"><strong>View more</strong></a>
                  </div>
                </div>
                <div class="related-comics">
                  <div class="row">
                    <div class="col-md-12">
                      <h4><strong>Related comics</strong></h4>
                    </div>

                      @foreach($character['comics'] as $key => $comic)
                        @if ($key < 4)
                          <div class="col-md-6">
                            <a href="javascript:void(0);" ng-click="getComic('<{$comic['resourceURI']}>')"><{ $comic['name'] }></a>
                          </div>
                        @endif
                      @endforeach

                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
          <div class="row">
            <div class="col-sm-12 text-center">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="#" class="fa fa-angle-left previous" aria-label="Previous"></a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" class="fa fa-angle-right next" aria-label="Next"></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        @else
          <h2 class="text-center not-results">No se encontraron resultados para "<{ $name }>"</2>
        @endif
      </div>
    </div>
    <div class="col-md-3 bar-favourites">
      <div class="list-favourites" ng-controller="FavouritesController as favourites">
        <h2 class="title title-favourites"><strong>My favourites</strong></h2>
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-12" ng-repeat="favourite in favourites">
            <div class="box-favourites" ng-click="getComic(favourite.resourceURI)">
              <button type="button" class="close" ng-click="remove(favourite.id)" aria-label="Close"><img src="img/btn-delete.png" /></button>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="img/btn-close.png" /></button>
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
            <img ng-src="{{ added && 'img/btn-favourites-primary.png' || 'img/btn-favourites-default.png' }}"  /><span class="text-uppercase">Add to favourites</span>
          </div>
          <div class="col-xs-6 button button-buy text-center">
            <img src="img/shopping-cart-primary.png" /><span class="text-uppercase">Buy for ${{ comic.price }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
