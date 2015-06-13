(function () {

  App.controller('FavoriteMarkerCtrl', [
    '$scope',
    'Event',
    'toastr',
    function ($scope, Event, toastr) {
      $scope.markFavorite = function (event) {
        Event.markFavorite(event.id).then(function () {
          toastr.success(event.title+' has been marked favorite.');
        });
      };
    }
  ]);

}).call(this);