angular.module('app')

  .controller('FavouritesController', function($scope, favourites, getComic) {
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
