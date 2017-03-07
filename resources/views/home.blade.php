@extends('layouts.base')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <div class="list-characters">
        <div class="row">

          <div class="col-md-12">
              <div class="row row-align" style="margin-bottom:20px;">
                <div class="col-xs-6">
                  <h2 class="pull-left title title-characters"><strong>Characters</strong></h2>
                </div>
                <div class="col-xs-6">
                  <select id="select-sortby" name="sort_by" class="form-control input-lg pull-right select-sortby">
                    <option value="">Sort by</option>
                    <option ng-repeat="n in ['Name']" ng-value="n">{{ n }}</option>
                  </select>
                </div>
              </div>
          </div>

          @foreach($characters as $character)
            <div class="col-md-6">
              <div class="box-character">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-character" src="<{ $character['image'] }>" alt="<{ $character['name'] }>">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading name-character"><{ $character['name'] }></h4>
                    <p class="description-character"><{ $character['description'] }></p>
                    <a href="#" class="btn btn-primary text-uppercase"><strong>View more</strong></a>
                  </div>
                </div>
                <div class="related-comics">
                  <div class="row">
                    <div class="col-md-12">
                      <h4><strong>Related comics</strong></h4>
                    </div>
                    @foreach($character['comics'] as $comic)
                      <div class="col-md-6"><a href="#" class=""  data-toggle="modal" data-target="#view-comics" style="padding: 8px 0;display:block;"><{ $comic['name'] }></a></div>
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
      </div>
    </div>
  </div>
</div>

<div id="view-comics" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="img/btn-close.png" /></button>
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img class="media-object img-comics" src="img/avengers.jpg" alt="">
            </a>
          </div>
          <div class="media-body">
            <h3 class="media-heading text-uppercase">All-new, All-different Avengers (2015) #1.1</h3>
            <p class="description-character">The times ha come! Their ranks shattered by Civil War, their spirits weighted down by a toll both personal and spiritual, Earth's Mightiest Heroes must find the resolve to stand united one final time against their greatest...</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-6 button button-addfavourites text-center">
            <img src="img/btn-favourites-default.png" /><span class="text-uppercase">Add to favourites</span>
          </div>
          <div class="col-sm-6 button button-buy text-center">
            <img src="img/shopping-cart-primary.png" /><span class="text-uppercase">Buy for $3.99</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
