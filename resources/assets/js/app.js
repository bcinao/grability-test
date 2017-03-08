(function(){
  var app = angular.module('home', []);

  app.config(['$httpProvider', function ($httpProvider) {
    // Configuraciones al servicio $http.
  }]);

  app.factory('getComic', function($http) {
    var apiKey = "9a0711e83b5b00c91e118c1211e7bdfa";

    return {
      data: {
        title: "",
        description: "",
        image: "",
        price: 0
      },
      get: function (url) {
        var self = this;

        $http.get(url + "?apikey=" + apiKey).then(function(response, status) {
          var data = response.data.data;

          self.data.title = data.results[0].title;
          self.data.description = data.results[0].description;
          self.data.image = data.results[0].thumbnail.path + '.jpg';
          self.data.price = data.results[0].prices[0].price;

          $('#view-comics').modal('show');
        });
      }
    };
  });

  app.controller('CharactersController', function($scope, getComic) {

    $scope.getComic = function (url) {
      getComic.get(url);
    };
  });

  app.controller('ComicController', function($scope, getComic) {
    $scope.data = getComic.data;
  });

})();
