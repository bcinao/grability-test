angular.module('app')
  .factory('getCharacters', function(config, $http) {

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
