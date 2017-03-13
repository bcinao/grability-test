angular.module('app')

  .controller('CharactersController', function($scope, getComic) {

    $scope.getComic = function (url) {
      getComic.get(url);
    };
  });
