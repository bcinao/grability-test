(function(){
  var app = angular.module('home', []);

  app.config(['$httpProvider', function ($httpProvider) {
    // Configuraciones al servicio $http.
  }]);

  app.constant('config', {
    apiKey: "9a0711e83b5b00c91e118c1211e7bdfa",
    apiUrl: 'http://gateway.marvel.com/v1/public/'
  });

  app.factory('favourites', function() {
    return {
      data: [],
      init: function () {
        var self = this,
            favourites = this.get();

        favourites.map(function(value) {
          self.data.push(value);
        });
      },
      get: function () {
        return angular.fromJson(localStorage.getItem("favourites")) || [];
      },
      verify: function (comic, callback) {

        /**
         * Verificar que el comic no se encuentre en la lista
         */
        var favourites = this.get(),
            match = false;

        $.each(favourites, function(key, value) {
          if (value.id == comic.id) {

            match = true;
            return false;
          }
        });

        if (typeof callback == "function") callback(match);
      },
      add: function (comic, callback) {
        var self = this;

        /**
         * Agregar el comic a la lista de favoritos
         */
        var add = function(bool) {

          if (!bool) {
            self.data.push({ id: comic.id, title: comic.title, image: comic.image, resourceURI: comic.resourceURI });
            localStorage.setItem("favourites", angular.toJson(self.data));
          }

          if (typeof callback == "function") callback(!bool);
        };

        self.verify(comic, add);
      },
      remove: function (id) {
        var self = this,
            favourites = this.get();

        self.data = favourites.filter(function(value) {
          return value.id != id;
        });

        localStorage.setItem("favourites", angular.toJson(self.data));
      }
    };
  });

  app.factory('getComic', function($http) {
    var apiKey = "9a0711e83b5b00c91e118c1211e7bdfa";

    return {
      data: {
        id: 0,
        title: "",
        description: "",
        image: "",
        price: 0
      },
      get: function (url, callback) {
        var self = this;

        $http.get(url + "?apikey=" + apiKey).then(function(response, status) {
          var data = response.data.data;

          self.data.id = data.results[0].id;
          self.data.title = data.results[0].title;
          self.data.description = data.results[0].description;
          self.data.image = data.results[0].thumbnail.path + '.jpg';
          self.data.price = data.results[0].prices[0].price;
          self.data.resourceURI = data.results[0].resourceURI;

          angular.element('#view-comics').modal('show');
        });
      }
    };
  });

  app.factory('getCharacters', function(config, $http) {

    return {
      data: [],
      get: function (name, callback) {
        var self = this;

        this.data = [];

        $http.get(config.apiUrl + "characters?nameStartsWith=" + name + "&limit=10&apikey=" + config.apiKey)
          .then(function(response, status) {
            var results = response.data.data.results;

            if (results.length) {
              self.data = results.map(function(value) {
                return { "id": value.id, "name": value.name, "image": value.thumbnail.path + "." + value.thumbnail.extension };
              });
            }

            callback(self.data);

          }, function errorCallback(response) {

            callback(self.data);
          });
      }
    };
  });

  app.controller('SearchController', function ($scope, $timeout, getCharacters) {
    $scope.results = [];
    $scope.show = false;
    $scope.error = false;
    $scope.timer = null;

    $scope.search = function () {
      $scope.error = false;

      if ($scope.name.length > 3) {

        if ($scope.timer) $timeout.cancel($scope.timer);

        $scope.timer = $timeout(function () {
            getCharacters.get($scope.name, function (response) {

              if (response.length) {
                $scope.results = response;
              } else {
                $scope.error = true;
              }

              $scope.show = true;
            });
        }, 250);
      } else {
        $scope.results = [];
      }
    };

    $scope.showToggle = function (e) {
      $scope.show = !$scope.show;
    };
  });

  app.controller('CharactersController', function($scope, getComic) {

    $scope.getComic = function (url) {
      getComic.get(url);
    };
  });

  app.controller('ComicsController', function($scope, getComic, favourites) {
    $scope.added = false;
    $scope.comic = getComic.data;

    $scope.addFavourites = function () {
      if (!$scope.added) {
        favourites.add($scope.comic, function (bool) {
          $scope.added = bool;
        });
      }
    };

    angular.element('#view-comics').on('show.bs.modal', function () {
      favourites.verify($scope.comic, function(bool) {
        $scope.added = bool;
      });
    });

  });

  app.controller('FavouritesController', function($scope, favourites, getComic) {
    favourites.init();

    $scope.favourites = favourites.data;

    $scope.remove = function (id) {
        favourites.remove(id);
        $scope.favourites = favourites.data;
    };

    $scope.getComic = function (url) {
      getComic.get(url);
    };
  });

})();
