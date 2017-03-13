angular.module('app')
  .controller('SearchController', function ($scope, $timeout, getCharacters) {
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
