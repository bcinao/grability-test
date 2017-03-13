angular.module('app', [])

.config(['$httpProvider', function ($httpProvider) {
  // Configuraciones al servicio $http.
}])

.constant('config', {
  apiKey: "9a0711e83b5b00c91e118c1211e7bdfa",
  apiUrl: 'http://gateway.marvel.com/v1/public/'
});
