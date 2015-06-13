(function (window) {
  'use strict';

  window.App.controller('HomeCtrl', [
    '$scope',
    '$rootScope',
    'Event',
    function ($scope, $rootScope, Event) {

      $scope.currentPage = 1;
      $scope.totalItems = 0;

      var fetchEvents = function () {
        Event.fetch($scope.currentPage).then(function (resp) {
          $scope.events = resp.data;
          $scope.totalItems = resp.total;
        });
      }

      $scope.$watch('currentPage', function () {
        fetchEvents();
      });

    }]);

})(window);