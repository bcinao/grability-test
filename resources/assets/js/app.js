(function(){
  var app = angular.module('home', []);

  app.controller('CharactersController', function() {
    this.product = gem;
  });

  var gem = {
      name: 'Muahhahah',
      price: 2.95,
      descripcion: '. . .'
  };

})();
