angular.module('app')
  .factory('favourites', function() {
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
