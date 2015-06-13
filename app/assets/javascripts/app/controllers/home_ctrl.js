(function (window) {
  'use strict';

  window.App.controller('HomeCtrl', [
    '$scope',
    '$rootScope',
    'Event',
    function ($scope, $rootScope, Event) {

      $scope.currentPage = 1;
      $scope.totalItems = 0;

      Event.fetch().then(function (resp) {
        $scope.events = resp;
      });

    }]);

})(window);