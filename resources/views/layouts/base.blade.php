<!DOCTYPE html>
<html ng-app="home">
  <head>
    <title>Grability Test</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="css/app.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <div class="container">
        <div class="row">
          <img src="img/logo.jpg" class="logo img-responsive pull-left" alt="">
          <div class="col-xs-8 col-md-6 col-center pull-right-sm">
            <div class="box-search">
              <input class="form-control input-lg input-search" type="text" placeholder="Search character..." />
              <i class="fa fa-search"></i>
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
