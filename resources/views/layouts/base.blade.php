<!DOCTYPE html>
<html ng-app="home">
  <head>
    <title>Grability Test</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="css/app.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <div class="container-fluid">
        <div class="row">
          <a href="/" class="navbar-brand"><img src="img/logo.jpg" class="logo img-responsive" alt="" /></a>
          <div class="col-xs-7 col-md-6 col-center pull-right-sm">
            <div class="box-search" ng-controller="SearchController as search">
              <div class="dropdown" ng-class="{ 'open': show }">
                <input data-toggle="dropdown" class="form-control input-lg input-search" type="text" ng-model="name" ng-keyup="search()" name="search" placeholder="Search character..." autofocus="auto" autocomplete="off" />
                <i></i>
                <ul class="dropdown-menu list-results list-unstyled">
                  <li ng-repeat="result in results"><a href="character/{{ result.id }}"><img class="img-result img-circle" ng-src="{{ result.image }}" alt="{{ result.name }}"> {{ result.name }}</a></li>
                  <li ng-if="error" class="text-center not-results">No character found</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main>
      @yield('content')
    </main>

    <footer>
      <div class="row row-align">
        <div class="col-xs-8">Grability 2016 - Todos los derechos reservados</div>
        <div class="col-xs-4">
          <img src="img/grability-logo.png" class="img-responsive pull-right" />
        </div>
      </div>
    </footer>
    <script src="js/app.js"></script>
  </body>
</html>
