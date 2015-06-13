(function (window) {
  'use strict';

  window.App.controller('HomeCtrl', [
    '$scope',
    '$rootScope',
    'Event',
    function ($scope, $rootScope, Event) {

      $scope.currentPage = 1;

      var fetchEvents = function () {
        Event.fetch($scope.currentPage).then(function (events) {
          $scope.events = events;
        });
      }

      $scope.$watch('currentPage', function () {
        fetchEvents();
      });

    }]);

})(window);