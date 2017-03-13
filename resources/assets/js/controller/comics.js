angular.module('app')

  .controller('ComicsController', function($scope, getComic, favourites) {
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
