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
                      <div class="col-md-6"><a href="#" class="" style="padding: 8px 0;display:block;"><{ $comic['name'] }></a></div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
  <style>

  </style>
@endsection
