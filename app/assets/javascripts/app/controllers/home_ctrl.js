(function (window) {
  'use strict';

  window.App.controller('HomeCtrl', [
    '$scope',
    '$rootScope',
    'Event',
    function ($scope, $rootScope, Event) {

      Event.query(function (events) {
        $scope.events = events;
      });

    }]);

})(window);