(function () {

  App.controller('FavoritesCtrl', [
    '$scope',
    'Event',
    function ($scope, Event) {
      Event.fetchFavorites().then(function (events) {
        $scope.events = events;
      });
    }
  ]);

}).call(this);