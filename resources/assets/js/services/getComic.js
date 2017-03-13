angular.module('app')
  .factory('getComic', function($http) {
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
