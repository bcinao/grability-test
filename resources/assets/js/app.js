angular.module('app', [])

.config(['$httpProvider', function ($httpProvider) {
  // Configuraciones al servicio $http.
}])

.constant('config', {
  apiKey: "9a0711e83b5b00c91e118c1211e7bdfa",
  apiUrl: 'http://gateway.marvel.com/v1/public/'
});

// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: 3000
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
/*
$('#carousel-comics').carousel({
  interval: 3000
});

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
*/
